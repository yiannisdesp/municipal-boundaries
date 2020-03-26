"use strict";

var _ucmmap = function () {
	var map,
		defaultLocale = 'en',
		languageDetection = function languageDetection() {
			var l = document.querySelector('html').attributes.lang;

			if (l !== 'undefined' && l !== undefined) {
				l = l.value;
				if (l.indexOf('en') > -1) return 'en';
				if (l.indexOf('el') > -1) return 'el';
				return defaultLocale;
			}

			return defaultLocale;
		},
		lang = languageDetection(),
		local = window.location.hostname.indexOf('local') > -1 ? true : false,
		dBaseUrl = local ? 'https://raw.githubusercontent.com/yiannisdesp/ucmmap/master/kml/' : document.getElementById('map').dataset.kmlbase,
		kmlDataSources = {
			lefkosia: dBaseUrl + 'lefkosia-district-' + lang + '.kml?t=' + (local ? Date.now() : 'v1'),
			larnaka: dBaseUrl + 'larnaka-district-' + lang + '.kml?t=' + (local ? Date.now() : 'v1'),
			ammochostos: dBaseUrl + 'ammochostos-district-' + lang + '.kml?t=' + (local ? Date.now() : 'v1'),
			lemesos: dBaseUrl + 'lemesos-district-' + lang + '.kml?t=' + (local ? Date.now() : 'v1'),
			keryneia: dBaseUrl + 'keryneia-district-' + lang + '.kml?t=' + (local ? Date.now() : 'v1'),
			paphos: dBaseUrl + 'paphos-district-' + lang + '.kml?t=' + (local ? Date.now() : 'v1')
		},
		layers = {},
		districts = {
			lefkosia: {
				latlng: {
					lat: 35.0698226,
					lng: 33.2483525
				},
				name: {
					en: 'Lefkosia District',
					el: 'Επαρχία Λευκωσίας'
				}
			},
			larnaka: {
				latlng: {
					lat: 34.9081331,
					lng: 33.3187845
				},
				name: {
					en: 'Larnaka District',
					el: 'Επαρχία Λάρνακας'
				}
			},
			ammochostos: {
				latlng: {
					lat: 35.3088792,
					lng: 33.8641198
				},
				name: {
					en: 'Ammochostos District',
					el: 'Επαρχία Αμμοχώστου'
				}
			},
			lemesos: {
				latlng: {
					lat: 34.7970721,
					lng: 32.8136594
				},
				name: {
					en: 'Lemesos District',
					el: 'Επαρχία Λεμεσού'
				}
			},
			keryneia: {
				latlng: {
					lat: 35.3155988,
					lng: 33.1554084
				},
				name: {
					en: 'Keryneia District',
					el: 'Επαρχία Κερύνειας'
				}
			},
			paphos: {
				latlng: {
					lat: 34.9751672,
					lng: 32.5058976
				},
				name: {
					en: 'Paphos District',
					el: 'Επαρχία Πάφου'
				}
			}
		},
		legendHTML = '',
		zoomSet = false,
		showDistrict = function showDistrict(lat, lng) {
			var center = new google.maps.LatLng(lat, lng);
			map.panTo(center);

			if (!zoomSet) {
				map.setZoom(11);
				zoomSet = true;
			}
		},
		render = function render() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: new google.maps.LatLng(35.0983305, 33.3349372),
				zoom: 10,
				mapTypeId: 'roadmap'
			});

			for (var k in kmlDataSources) {
				// render layer
				layers[k] = new google.maps.KmlLayer(kmlDataSources[k], {
					suppressInfoWindows: false,
					preserveViewport: true,
					map: map
				}); // generate legend html

				legendHTML += "\n                <div class=\"item\">\n                    <a href=\"#\" class=\"maplink d-".concat(k, "\" data-lat=\"").concat(districts[k].latlng.lat, "\" data-lng=\"").concat(districts[k].latlng.lng, "\">\n                        ").concat(districts[k].name[lang], "\n                    </a>\n                </div>\n            ");
			}

			legendHTML += '<div style="text-align:right;font-size:11px;margin-right:10px;clear:both;"><br><i>OpenDataCy</i></div>'; // render generated legend markup

			document.getElementById('legend').innerHTML = legendHTML; // bind generated links with click event

			setTimeout(function () {
				document.querySelectorAll('.mmap-wrap a.maplink').forEach(function (node) {
					node.addEventListener('click', function (e) {
						e.preventDefault();
						showDistrict(this.dataset.lat, this.dataset.lng);
						document.querySelectorAll('.mmap-wrap .item').forEach(function (node) {
							node.classList.remove('active');
						});
						this.parentNode.classList.add('active');
					});
				});
			}, 500);
		};

	return {
		init: render
	};
}();

function initMBMap() {
	_ucmmap.init();
}