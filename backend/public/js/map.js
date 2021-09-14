var map;
var marker = [];
var geocoder;
var infoWindow = [];

function initMap() {

    if(!(key_word === '')) {

        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': key_word // TAM 東京
        }, function (results, status) { // 結果
            if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
                var mapLatLng = results[0].geometry.location;
                var zoom = 15;
                createMap(mapLatLng, zoom)
            } else { // 失敗した場合
                alert('検索した内容がマップ上に見つかりませんでした。');
            }
        });
    }else{
        var mapLatLng = new google.maps.LatLng({lat: 37.6954806, lng: 136.76325010000005});
        var zoom = 6;
        createMap(mapLatLng, zoom)
    }







}

function createMap(mapLatLng, zoom)
{

    map = new google.maps.Map(document.getElementById('map'), { // 地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: zoom, // 地図のズームを指定

        //コントロール削除
        mapTypeControl: false,
        panControl: false,
        streetViewControl: false,

        styles: [
            {
                //全てのラベルを非表示
                featureType: 'all',
                elementType: 'labels',
                stylers: [
                    {visibility: 'off'},
                ],
            },
        ],
    });

    // マーカー毎の処理
    for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: parseFloat(markerData[i]['lat']), lng: parseFloat(markerData[i]['lng'])}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
            position: markerLatLng, // マーカーを立てる位置を指定
            map: map, // マーカーを立てる地図を指定
            icon: {
                url: '../images/coupon.png',// マーカーの画像を変更
                scaledSize : new google.maps.Size(100, 70),//サイズ調節
            }
        });

        markerEvent(i); // マーカーにクリックイベントを追加
    }

}


// 投稿記事のクリックイベント
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
         location.href = '/main/user_detail/' + markerData[i]['id'];
    });
}
