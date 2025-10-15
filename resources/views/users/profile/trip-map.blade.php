@extends('layouts.app')

@section('title', 'Trip-map')

@section('content')
<style>

.trip-map-page main.py-4 {
    display: flex;
  flex-direction: row;
  height: calc(100vh - 70px); /* ← ナビバーの高さ分を引く（約70px） */
  width: 100vw;
  padding: 0 !important;
  margin: 0 !important;
  background-color: #E6F4FA;
  overflow: hidden;
}

/* bodyとhtmlも100%にする（高さの基準） */
html, body {
height: 100%;
  margin: 0;
  padding: 0;
  background-color: #E6F4FA;
  overflow-x: hidden;  /* ← 横だけ隠す */
  overflow-y: auto; 
  
}
p span {
  margin-left: 0.5em; /* ← 半角1文字分くらい */
}

.col{
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

.map-container {
    width: 100%;       /* 親幅いっぱい */
  height: 80vh;      /* PC時はビュー高の80%など（必要に応じ調整） */
  max-width: 900px;  /* PCで大きくしすぎないための上限（任意） */
  margin: 0 auto;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #E6F4FA;
}
#map{
  display: block;
  width: 600px;
   height: 660px;
}

#map svg {
  width: 100%;
  height: 100%;
  display: block;
  max-width: none;
  /* preserveAspectRatio はJS側でも指定しますが念のため */
}

 
  path {
    stroke: #333;
    stroke-width: 0.5;
    fill: #ccc;
  }
  path:hover {
    fill: #F1BDB2;
  }

  .okinawa-frame {
    fill: none;
    stroke: #aaa;
    stroke-width: 1;
  }

  .okinawa-line {
  stroke: #aaa;
  stroke-width: 1;
}

  .spinner-wrapper {
    position: absolute;
  bottom: 5%;
  left: 60%;
  z-index: 10;
}

.spinner-outer {
  position: relative;
  width: 200px;
  height: 200px;
}

.spinner-outer::before {
  content: '';
  position: absolute;
  inset: 0;
  border: 20px solid #FFFF;
  border-radius: 50%;
}

.spinner-outer::after {
  content: '';
  position: absolute;
  inset: 0;
  border: 20px solid transparent;
  border-top-color: #F1BDB2;
  border-radius: 50%;
  animation: spin 1.5s linear infinite;
}

.spinner-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.spinner-text p {
  margin: 0;
}

.spinner-text .label {
  font-family: 'Source Serif Pro', serif;
  color: #9F6B46;
  font-weight: 600;
  font-size: 20px;
  padding-top: 1rem;
}

.spinner-text .count {
  font-family: 'Source Serif Pro', serif;
  color: #9F6B46;
  font-weight: bold;
  font-size: 65px;
}

.big-card-body{
    height: 75vh;
    overflow-y:auto;
}
.big-card{
   border:3px solid #9F6B46 ;
   background-color: #FFFBEB;
   border-radius: 20px;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);   
}

.post-card{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

@media (max-width: 600px) {
    .trip-map-page main.py-4 {
    flex-direction: column; /* 横 → 縦配置 */
    height: auto;
    overflow: auto; /* スクロール許可 */
  }

  html, body {
    overflow-y: auto;     /* ← ページ全体をスクロール可能に */
  } 

  .spinner-wrapper {
    position: absolute;
    bottom: 0%;
    right: 35%;
    transform: translateX(80%) scale(0.9);
  }
    .col-auto{
        padding: 0;
    }
  .phone {
    font-size: 12px;
    padding: 0;
  }
  .fa-heart.fa-star{
    font-size: 12px;
    padding: 0;
  }
  .badge{
    font-size: 8px;
  }
  .date{
    font-size: 9px;
  }
  .name{
    padding-left:0.5rem;
  }


.big-card-body {
  padding: 1rem;
  height: auto;         
  overflow-y: visible; 
}

.big-card {
    order: 2;
    width: 100%;
    border-radius: 15px 15px 0 0;
    overflow-y: visible; 
    max-height: none; 
    border: 3px solid #9F6B46;
  background-color: #FFFBEB;
  border-radius: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

.map-container {
    width: 100%;
    height: 45vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #map svg {
    transform-origin: center;
    transform: none; 
    height: 45vh;
  }

  .map{
    display:block;
    width: 100%;
    height: auto;
    object-fit: contain;
    margin:0 auto;
  }

  .spinner-outer {
    width: 140px;
    height: 140px;
  }

  .spinner-outer::before,
  .spinner-outer::after {
    border-width: 12px; 
  }

.spinner-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -40%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0rem;   
  text-align: center;
}

.spinner-text p { 
    margin: 0; 
    padding: 0; 
    line-height: 1; 
} 

.spinner-text .label {
  font-size: 16px;
  line-height: 1;
  margin: 2;
  padding: 0;
  
}
}

</style>


    {{-- Nav bar --}}

<div class="container-fluid">
    {{-- Map  --}}
  <div class="row">
    <div class="col" style="width: 50vh; height: 50vh;">
        <p class="fw-bold h2 mt-3  d-flex justify-content-center ">Click map <span>  to view full map</span></p>
            <div class="map-container ">
                 <div id="map" class="map"></div>
                    <div class="spinner-wrapper">
                        <div class="spinner-outer">
                            <div class="spinner-text">
                                <p class="label  p-0 m-0">Completed</p>
                                <p class="count p-0 m-0">5<span style="font-size: 27px">/47</span></p>
                            </div>
                        </div>
                    </div>
            </div>
    </div>

    {{-- Post --}}
    <div class="col mt-1">
        <div class="card mt-4 big-card">
            <div class="card-header border-0">
                <h1 class="fw-bold  d-flex justify-content-center " style="color:#9F6B46;">HOKKAIDO</h3>
            </div>
            <div class="card-body big-card-body" >
                <div class="row align-items-center mb-2">
                    <div class="col ps-2 pe-0">
                        <div class="card border-0 post-card">
                            <div class="card-header border-0 p-0">
                               <a href="#">
                                <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
                               </a> 
                            </div>
                           
                            <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" phone fw-bold">Title</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="phone"><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                        </div>
                                    </div>
                               
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" date fw-bold m-0">Aug 20, 2025</p>
                                        </div>
                                        <div class="col-auto ">
                                        <div class="badge bg-opacity-50">Category</div>  
                                        </div>
                                    </div>
                            </div>
                        </div>
            
                    </div>
                    <div class="col ps-2 pe-2">
                        <div class="card border-0 post-card">
                            <div class="card-header p-0 border-0 ">
                               <a href="#">
                                <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
                               </a> 
                            </div>
                           
                            <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" phone fw-bold">Title</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="phone"><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                        </div>
                                    </div>
                               
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" date fw-bold m-0">Aug 20, 2025</p>
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
                    <div class="col ps-2 pe-0">
                        <div class="card border-0 post-card">
                            <div class="card-header border-0 p-0">
                               <a href="#">
                                <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
                               </a> 
                            </div>
                           
                            <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" phone fw-bold">Title</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="phone"><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                        </div>
                                    </div>
                               
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" date fw-bold m-0">Aug 20, 2025</p>
                                        </div>
                                        <div class="col-auto ">
                                        <div class="badge bg-opacity-50">Category</div>  
                                        </div>
                                    </div>
                            </div>
                        </div>
            
                    </div>
                    <div class="col ps-2 pe-2">
                        <div class="card border-0 post-card">
                            <div class="card-header border-0 p-0">
                               <a href="#">
                                <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
                               </a> 
                            </div>
                           
                            <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" phone fw-bold">Title</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="phone"><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                        </div>
                                    </div>
                               
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" date fw-bold m-0">Aug 20, 2025</p>
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
                    <div class="col ps-2 pe-0">
                        <div class="card border-0 post-card">
                            <div class="card-header border-0 p-0">
                               <a href="#">
                                <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
                               </a> 
                            </div>
                           
                            <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" phone fw-bold">Title</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="phone"><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                        </div>
                                    </div>
                               
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" date fw-bold m-0">Aug 20, 2025</p>
                                        </div>
                                        <div class="col-auto ">
                                        <div class="badge bg-opacity-50">Category</div>  
                                        </div>
                                    </div>
                            </div>
                        </div>
            
                    </div>
                    <div class="col ps-2 pe-2">
                        <div class="card border-0 post-card">
                            <div class="card-header border-0 p-0">
                               <a href="#">
                                <img src="{{ asset('images/たぬきち.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
                               </a> 
                            </div>
                           
                            <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" phone fw-bold">Title</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="phone"><i class="fa-solid fa-heart"></i>100 <i class="fa-solid fa-star"></i></p>
                                        </div>
                                    </div>
                               
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <p class=" date fw-bold m-0">Aug 20, 2025</p>
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
  </div>
 </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
      const baseWidth = 675;
      const baseHeight = 670;
      const container = document.getElementById('map');
    
      // 既存SVGを削除（リロード対策）
      d3.select('#map').selectAll('*').remove();
    
      // SVGを作成
      const svg = d3.select("#map")
        .append("svg")
        .attr("viewBox", `0 0 ${baseWidth} ${baseHeight}`)
        .attr("preserveAspectRatio", "xMidYMid meet")
        .style("width", "100%")
        .style("height", "100%");
    
      // プロジェクション定義（scaleはあとで自動調整）
      const projection = d3.geoMercator()
        .center([137, 38])
        .translate([baseWidth / 2, baseHeight / 2]);
    
      const path = d3.geoPath().projection(projection);
    
      // 📍コンテナに合わせてスケール調整
      function adjustForContainer() {
        const cw = document.querySelector(".map-container").clientWidth;
        const scaleFactor = cw / baseWidth;
        projection.scale(1800 * scaleFactor);
        svg.selectAll("path").attr("d", path);
      }
    
      // GeoJSON読み込み
      d3.json("{{ asset('geojson/japan.geojson') }}").then(function(data) {
        svg.selectAll("path")
          .data(data.features)
          .enter()
          .append("path")
          .attr("d", path)
          .attr("fill", "#dcdcdc")
          .attr("stroke", "#333")
          .on("mouseover", function(event, d) {
            d3.select(this).attr("fill", "#ff7f50");
          })
          .on("mouseout", function(event, d) {
            d3.select(this).attr("fill", "#dcdcdc");
          })
          .on("click", function(event, d) {
            alert(d.properties.nam_ja + " がクリックされました");
          });
    
        // ✅ 沖縄を別描画
        const okinawaProjection = d3.geoMercator()
          .center([127.6, 26.2])
          .scale(4000)
          .translate([120, 120]);
        const okinawaPath = d3.geoPath().projection(okinawaProjection);
        const okinawa = data.features.filter(d => d.properties.nam_ja === "沖縄県");
    
        svg.selectAll(".okinawa")
          .data(okinawa)
          .enter()
          .append("path")
          .attr("class", "okinawa")
          .attr("d", okinawaPath)
          .attr("fill", "#ffdcb2")
          .attr("stroke", "#666")
          .attr("stroke-width", 0.5)
          .on("mouseover", function(event, d) { d3.select(this).attr("fill", "#ffb37f"); })
          .on("mouseout", function(event, d) { d3.select(this).attr("fill", "#ffdcb2"); });
    
        // 沖縄囲い線
        svg.append("line").attr("class", "okinawa-line").attr("x1", 210).attr("y1", 30).attr("x2", 210).attr("y2", 170);
        svg.append("line").attr("class", "okinawa-line").attr("x1", 30).attr("y1", 170).attr("x2", 210).attr("y2", 170);
    
        // 🌍 初回描画後にスケール調整
        adjustForContainer();
      });
    
      // 📱 リサイズ時も再調整
      window.addEventListener("resize", adjustForContainer);
    });
    </script>
    
    