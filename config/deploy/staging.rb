# frozen_string_literal: true

# Capistrano config
capistrano = fetch(:capistrano_config)['capistrano']

# Variables
set :stage, :staging
set :deploy_to, "#{capistrano['deploy_path']}/#{fetch(:stage)}/#{fetch(:application)}"
set :server_name, capistrano['server_name']['staging']

# Server
server capistrano['deploy_server_ip'], user: fetch(:deploy_user).to_s, roles: %w( web app db )
