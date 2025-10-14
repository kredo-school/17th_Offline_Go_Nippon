@extends('layouts.app')

@section('title', 'Profile ')

@section('content')
<style>
    .col-md-4{
        font-family: 'Source Serif Pro', serif;
    }
    div{
        color:#9F6B46;
    }
    span{
        color:#CAAE99;
    }

    .badge{
        background-color:#ECF9FF;
        color:#9F6B46;
    }


</style>

{{-- Nav bar --}}


    {{-- Profile area --}}
<div class="container">
<div class="row">
    <div class="col-md-4 mt-2">
        <div class="row">
            <div class="col-auto">
                <i class="fa-solid fa-circle-user text-secondary" style="font-size: 80px; border: 5px solid #9F6B46; border-radius: 50%; 
                     padding:0;" ></i>
            </div>
            <div class="col-auto">
                
                <div class="row">
                    <h3>John</h3>
                </div>
                <div class="row">
                    <div class="row text-center mt-3 mb-2">
                        <div class="col-4">
                            <div class="fs-5 fw-bold" >10</div>
                            <div class="small" >Posts</div>
                        </div>
                        <div class="col-4">
                            <div class="fs-5 fw-bold" >10</div>
                            <div class="small">Followers</div>
                        </div>
                        <div class="col-4">
                            <div class="fs-5 fw-bold" >10</div>
                            <div class="small" >Followings</div>
                        </div>
                    </div>
                                   
                </div>
            </div>
        </div>
        <div class="row">
            <h5><span> country:</span>USA</h5>
        </div>
        <div class="row" >
            <p>Hi. I'm John. <br> I love travering, meeting new people, and exploring different cultures. I'm always currious to learn new things and share experiences...</p>
        </div>
        <div class="row mb-2">
            <div class="col-auto">
                <button type="submit" class="btn" style=" background-color: #F1BDB2; color:#FFFF;">Edit Pofile</button>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn" style=" border-color: #F1BDB2; color:#F1BDB2;">Favorites</button>
            </div>
        </div>
        <div class="row">
            <p >Click map <span>to view full map</span></p>
            {{-- Map Image --}}
            <div id="map" style="width: 300px; height: 300px; margin: 0 auto; border: 1px solid #ccc;"></div>
            {{-- <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;"> --}}
        </div>
    </div>

    {{-- Post area --}}
    <div class="col-md-8 mt-2">
        <div class="row align-items-center mb-2">
            <div class="col-4 ">
                <div class="card">
                    <div class="card-header">
                       <a href="#">
                        <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;">  
                       </a> 
                    </div>
                   
                    <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <p class="fw-bold">Title</p>
                                </div>
                                <div class="col-auto">
                                    <p><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                </div>
                            </div>
                       
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <p class="fw-bold m-0">Aug 20, 2025</p>
                                </div>
                                <div class="col-auto ">
                                <div class="badge bg-opacity-50">Category</div>  
                                </div>
                            </div>
                    </div>
                </div>
    
            </div>

            <div class="col-4 ">
                <div class="card">
                    <div class="card-header">
                        <a href="#">
                          <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold">Title</p>
                            </div>
                            <div class="col-auto">
                                <p><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold m-0">Aug 20, 2025</p>
                            </div>
                            <div class="col-auto ">
                              <div class="badge bg-opacity-50">Category</div>  
                            </div>
                        </div>

                    </div>
                </div>
    
            </div>

            <div class="col-4 ">
                <div class="card">
                    <div class="card-header">
                       <a href="#">
                          <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;">
                       </a>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold">Title</p>
                            </div>
                            <div class="col-auto">
                                <p><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold m-0">Aug 20, 2025</p>
                            </div>
                            <div class="col-auto ">
                              <div class="badge bg-opacity-50">Category</div>  
                            </div>
                        </div>

                    </div>
                </div>
    
            </div>

    
        </div>

        <div class="row align-items-center mb-2">
            <div class="col-4 ">
                <div class="card">
                    <div class="card-header">
                       <a href="#">
                        <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;">  
                       </a> 
                    </div>
                   
                    <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <p class="fw-bold">Title</p>
                                </div>
                                <div class="col-auto">
                                    <p><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                </div>
                            </div>
                       
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <p class="fw-bold m-0">Aug 20, 2025</p>
                                </div>
                                <div class="col-auto ">
                                <div class="badge bg-opacity-50">Category</div>  
                                </div>
                            </div>
                    </div>
                </div>
    
            </div>

            <div class="col-4 ">
                <div class="card">
                    <div class="card-header">
                        <a href="#">
                          <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold">Title</p>
                            </div>
                            <div class="col-auto">
                                <p><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold m-0">Aug 20, 2025</p>
                            </div>
                            <div class="col-auto ">
                              <div class="badge bg-opacity-50">Category</div>  
                            </div>
                        </div>

                    </div>
                </div>
    
            </div>

            <div class="col-4 ">
                <div class="card">
                    <div class="card-header">
                       <a href="#">
                          <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;">
                       </a>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold">Title</p>
                            </div>
                            <div class="col-auto">
                                <p><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fw-bold m-0">Aug 20, 2025</p>
                            </div>
                            <div class="col-auto ">
                              <div class="badge bg-opacity-50">Category</div>  
                            </div>
                        </div>

                    </div>
                </div>
    
            </div>

    
        </div>

    </div>
</div>
</div>
@endsection


@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h3>John</h3>
      <p>Click map to view</p>

      {{-- 地図表示領域 --}}
      <div id="map" style="width: 100%; height: 400px; border: 1px solid #ddd;"></div>
    </div>

    <div class="col-md-8">
      {{-- 投稿カードなど --}}
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- Leaflet本体（layoutsに入れていない場合ここに入れても可） -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // --- (A) バックエンドから訪問済県コード配列を渡す例 ---
  // コントローラで: $visitedPrefCodes = [13,27]; return view(..., compact('visitedPrefCodes'));
  const postedPrefCodes = @json($visitedPrefCodes ?? [13,27]); // デフォルトはデモ用の配列

  // --- (B) 地図初期化 ---
  const map = L.map('map').setView([37.5, 137.0], 5); // 日本の中央あたり
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 10,
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // --- (C) GeoJSON の取得方法（外部 or ローカル） ---
  // 推奨: ローカルに置く -> fetch('/geo/japan.geojson')
  const geojsonUrl = '/geo/japan.geojson'; // もし public/geo/japan.geojson に保存したらこれ
  // const geojsonUrl = 'https://raw.githubusercontent.com/dataofjapan/land/master/japan.geojson'; // 外部例（CORS注意）

  fetch(geojsonUrl)
    .then(res => {
      if (!res.ok) throw new Error('GeoJSON fetch failed: ' + res.status);
      return res.json();
    })
    .then(data => {
      // 確認用（まずプロパティ構造をconsoleで見る）
      console.log('GeoJSON features example props:', data.features[0].properties);

      // スタイル関数：投稿がある県は色を変える
      const styleFn = (feature) => {
        // 以下は例。GeoJSONによってコードのプロパティ名が違うことがある。
        // ここでは feature.properties.code か feature.properties.id などを想定。
        const code = feature.properties && (feature.properties.code || feature.properties.id || feature.properties.prefcode);
        // nameの代替利用（コードが無い場合）
        const name = feature.properties && (feature.properties.name || feature.properties.nam_ja || feature.properties.N03_004);

        const isPosted = code ? postedPrefCodes.includes(Number(code)) : postedPrefCodes.includes(name);
        return {
          fillColor: isPosted ? "#F1BDB2" : "#E0E0E0",
          weight: 1,
          opacity: 1,
          color: "#666",
          fillOpacity: 0.85
        };
      };

      // クリックやホバーの設定
      const onEachFeature = (feature, layer) => {
        const name = feature.properties && (feature.properties.name || feature.properties.nam_ja || feature.properties.N03_004) || 'Unknown';
        layer.bindTooltip(name, {sticky: true});
        layer.on({
          click: () => {
            // ここにモーダル表示や別ルートへの遷移を書く
            alert(name + ' がクリックされました');
          }
        });
      };

      // GeoJSONを地図に追加
      L.geoJSON(data, {
        style: styleFn,
        onEachFeature: onEachFeature
      }).addTo(map);
    })
    .catch(err => {
      console.error(err);
      // エラー時：ユーザーに分かりやすくする
      const mapDiv = document.getElementById('map');
      mapDiv.innerHTML = '<p style="padding: 10px;">地図データを読み込めませんでした。</p>';
    });
});
</script>
@endsection

