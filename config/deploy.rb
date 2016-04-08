# frozen_string_literal: true

require 'yaml'
capistrano_config = YAML.load_file('./config/capistrano.yml')

# config valid only for current version of Capistrano
lock '3.4.0'

set :application, capistrano_config['capistrano']['application_name']
set :repo_url, capistrano_config['capistrano']['repo_url']
set :deploy_user, capistrano_config['capistrano']['deploy_user']

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
# set :deploy_to, '/var/www/my_app_name'

# Default value for :scm is :git
set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('config/config.php', 'config/application.yml', 'config/mailing.yml', 'config/dkim/dkim.private.key')

# Default value for linked_dirs is []
set :linked_dirs, fetch(:linked_dirs, []).push('vendor')

# Default value for default_env is {}
set :default_env, rvm_bin_path: '~/.rvm/bin'

# Default value for keep_releases is 5
set :keep_releases, 5

# Capistrano config
set :capistrano_config, capistrano_config

# Helpers (verification if htpasswd array is not empty AND if username and password are not empty either)
def htpasswd?(htpasswd_array)
  fetch(:stage) == :staging && !htpasswd_array.nil? && has_protector?(htpasswd_array)
end

def has_protector?(htpasswd_array)
  htpasswd_array.each do |htpass|
    unless htpass['username'].to_s.empty? || htpass['password'].to_s.empty?
      return true
    end
  end
  return false
end
