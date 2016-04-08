# frozen_string_literal: true

# Capistrano config
capistrano = fetch(:capistrano_config)['capistrano']

# Variables
set :stage, :production
set :deploy_to, "#{capistrano['deploy_path']}/#{fetch(:stage)}/#{fetch(:application)}"
set :server_name, capistrano['server_name']['production']

# Server
server capistrano['deploy_server_ip'], user: fetch(:deploy_user).to_s, roles: %w( web app db )
