set :deploy_to, "/var/www/vhosts/ifkeithraymond.com/subdomains/bum_haus"
set :document_root, "/var/www/vhosts/ifkeithraymond.com/subdomains/bum_haus/httpdocs"
set :owner, "keith"
set :group1, "keith"
set :group2, "wheel"

role :web, "bum-haus.ifkeithraymond.com:1500"
role :app, "bum-haus.ifkeithraymond.com:1500"
