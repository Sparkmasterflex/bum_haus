set :stages, %w(staging production)
set :default_stage, "staging"
require 'capistrano/ext/multistage'

set(:user) { Capistrano::CLI.ui.ask("SSH username: ") }

ssh_options[:forward_agent] = true

set :application, "bum_haus"
set :repository,  "git@github.com:Sparkmasterflex/#{application}.git"
set :branch, "master"

set :scm, :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`

set :scm_username, 'Sparkmasterflex'
set :scm_passphrase, "Mate255Coffee"


set :copy_strategy, :checkout
set :keep_releases, 2
set :use_sudo, false
set :copy_compression, :bz2

after "deploy:update", "deploy:cleanup"
after "deploy", "deploy:create_symlinks"

namespace :deploy do
  desc "This is here to overide the original :restart"
  task :restart, :roles => :app do
    # do nothing but overide the default
  end
  
  task :finalize_update, :roles => :app do
    run "chmod -R g+w #{latest_release}" if fetch(:group_writable, true)
    run "chown -R #{owner}:#{group2} #{releases_path}/#{release_name}"
    # overide the rest of the default method
  end

  desc "Create additional EE directories and set permissions after initial setup"
  task :after_setup, :roles => :app do
  end

  desc "Create symlinks to shared data such as config files and uploaded images"
  task :create_symlinks, :roles => :app do
    # current and httpdocs links
    run "ln -fs #{deploy_to}/#{current_dir} #{document_root}"
    run "chown -h #{owner}:#{group1} #{deploy_to}/#{current_dir} #{document_root}"
  end
end