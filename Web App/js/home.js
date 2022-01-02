let map = L.map('map');
let tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
map.addLayer(tiles)
map.locate({setView: true, maxZoom: 16});
lc = L.control.locate({initialZoomLevel:10}).addTo(map);
