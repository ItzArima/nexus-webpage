MinecraftAPI.getServerStatus('mc.nexuscraft.it', {
  port: 25565 // optional, only if you need a custom port
}, function (err, status) {
  if (err) {
      return document.getElementById('onlinePlayers').innerHTML = 'Error loading status';
  }

  // you can change these to your own message!
  document.getElementById('onlinePlayers').innerHTML += status.players.now;
  document.getElementById('status').innerHTML = status.server ? 'Online' : 'Offline';
});