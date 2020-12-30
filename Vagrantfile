required_plugins = %w( vagrant-hostmanager vagrant-vbguest )
required_plugins.each do |plugin|
    exec "vagrant plugin install #{plugin}" unless Vagrant.has_plugin? plugin
end

Vagrant.configure("2") do |config|

  config.vm.provider 'virtualbox' do |vb|
      vb.name = 'yii2shop'
  end

  config.vm.hostname = 'yii2shop'

  config.vm.box = "ubuntu/bionic64"

  config.vm.network "private_network", ip: "192.168.83.139"

  config.vm.synced_folder './', '/yii2shop', owner: 'vagrant', group: 'vagrant'
  config.vm.synced_folder '.', '/vagrant', disabled: true

  config.vm.provision :shell, :path => "vagrant_bootstrap/01-prepare-bionic64.sh"
  config.vm.provision :shell, :path => "vagrant_bootstrap/02-configure-app-for-bionic64.sh"
  config.vm.provision :shell, :path => "vagrant_bootstrap/03-configure-app.sh"

  config.vm.network "forwarded_port", guest: 80, host: 8000

end
