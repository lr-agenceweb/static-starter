# frozen_string_literal: true
namespace :upload do
  desc 'Symlink shared configuration files'
  task :config do
    on roles(:web) do
      execute "mkdir -p #{shared_path}/config"
      upload! StringIO.new(File.read('config/config.php')), "#{shared_path}/config/config.php"
      upload! StringIO.new(File.read('config/mailing.yml')), "#{shared_path}/config/mailing.yml"
      upload! StringIO.new(File.read('config/application.fr.yml')), "#{shared_path}/config/application.fr.yml"
      upload! StringIO.new(File.read('config/application.en.yml')), "#{shared_path}/config/application.en.yml"
      invoke 'upload:set_permissions'
    end
  end

  task :set_permissions do
    on roles(:web) do
      sudo :chmod, '755', "#{shared_path}/config/config.php"
      sudo :chmod, '755', "#{shared_path}/config/mailing.yml"
      sudo :chmod, '755', "#{shared_path}/config/application.fr.yml"
      sudo :chmod, '755', "#{shared_path}/config/application.en.yml"
    end
  end

  desc 'Upload DKIM private key'
  task :dkim do
    on roles(:web) do
      execute "mkdir -p #{shared_path}/config/dkim"
      upload! StringIO.new(File.read('config/dkim/dkim.private.key')), "#{shared_path}/config/dkim/dkim.private.key"
      sudo :chmod, '755', "#{shared_path}/config/dkim/dkim.private.key"
    end
  end

  desc 'Generate and upload .htpasswd protection'
  task :htpasswd do
    on roles(:web) do
      htpasswd_array = fetch(:capistrano_config)['htpasswd']
      if htpasswd?(htpasswd_array)
        erb = File.read 'lib/capistrano/templates/htpasswd.erb'
        tmp_file = "/tmp/htpasswd_#{fetch(:application)}"
        upload! StringIO.new(ERB.new(erb).result(binding)), tmp_file
        sudo :mv, tmp_file, "/etc/htpasswd/#{fetch(:application)}"
        sudo :chmod, '644', "/etc/htpasswd/#{fetch(:application)}"
      end
    end
  end

  desc 'Upload all yml, dkim, missing, seeds and htpasswd authentication in one time'
  task :all do
    invoke 'upload:config'
    invoke 'upload:dkim'
    invoke 'upload:htpasswd' if htpasswd?(htpasswd_array)
  end
end
