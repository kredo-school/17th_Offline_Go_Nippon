
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
    .card-header{
        padding: 0;
    }


    @media (max-width: 600px) {
.col-auto{
    padding: 0;
}
  .phone {
    font-size: 12px;
    padding: 0;
  }
  .fa-heart,fa-star{
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

}
    .map-container {
  position: relative;
  width: 100%;
  height: 350px;
}
 
  path {
    stroke: #333;
    stroke-width: 0.5;
    fill: #ccc;
  }
  path:hover {
    fill: #F1BDB2;
  }

  .spinner-wrapper {
  position: absolute;
  bottom: 10px;
  right: 10px;
  z-index: 10; /* 地図の上に出す */
}


@media (max-width: 768px) {
  .spinner-wrapper {
    bottom: 5px;
    right: 18%;
    transform: translateX(50%) scale(0.9);
  }
}

/* 外円（淡いベージュ） */
.spinner-outer {
  position: relative;
  width: 150px;
  height: 150px;
}

.spinner-outer::before {
  content: '';
  position: absolute;
  inset: 0;
  border: 15px solid #FFFF;
  border-radius: 50%;
}


.spinner-outer::after {
  content: '';
  position: absolute;
  inset: 0;
  border: 15px solid transparent;
  border-top-color: #F1BDB2;
  border-radius: 50%;
  animation: spin 1.5s linear infinite;
}


/* 中央のテキスト */
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
  font-size: 15px;
}

.spinner-text .count {
  font-family: 'Source Serif Pro', serif;
  color: #9F6B46;
  font-weight: bold;
  font-size: 32px;
}

</style>

{{-- Nav bar --}}


    {{-- Profile area --}}
<div class="container">
<div class="row">
    <div class="col-md-4 mt-2">
        <div class="row ps-2">
            <div class="col-auto">
                <i class="fa-solid fa-circle-user text-secondary" style="font-size: 80px; border: 5px solid #9F6B46; border-radius: 50%; 
                     padding:0;" ></i>
            </div>
            <div class="col-auto">
                
                <div class="row name">
                    <h3 >John</h3>
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
            <div class="col-auto px-2">
                <button type="submit" class="btn p-auto" style=" background-color: #F1BDB2; color:#FFFF;">Edit Pofile</button>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn p-auto" style=" border-color: #F1BDB2; color:#F1BDB2;">Favorites</button>
            </div>
        </div>
        <div class="row">
            <p class="fw-bold h5">Click map <span>to view full map</span></p>
            {{-- Map Image --}}
            <div class="map-container  ">
                <a href="#"> 
                        <div id="map" style="width: 100%; height: 350px;"></div>
                </a>

                <div class="spinner-wrapper">
                    <div class="spinner-outer">
                    <div class="spinner-text">
                        <p class="label">Completed</p>
                        <p class="count">5 <span style="font-size: 20px">/47</span></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Post area --}}
    <div class="col-md-8 mt-2 ">
        <div class="row align-items-center mb-2">
            <div class="col-4 ps-2 pe-0">
                <div class="card">
                    <div class="card-header ">
                       <a href="#">
                        <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
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
            <div class="col-4 ps-2 pe-0">
                <div class="card">
                    <div class="card-header">
                       <a href="#">
                        <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
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

            <div class="col-4 ps-2 pe-0">
                <div class="card">
                    <div class="card-header">
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
            <div class="col-4 ps-2 pe-0">
                <div class="card">
                    <div class="card-header p-0">
                       <a href="#">
                        <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
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
            <div class="col-4 ps-2 pe-0">
                <div class="card">
                    <div class="card-header">
                       <a href="#">
                        <img src="{{ asset('images/japan-map.png') }}" alt="Japan Map" style="width: 100%; height:auto;" class="p-0">  
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

            <div class="col-4 ps-2 pe-0">
                <div class="card">
                    <div class="card-header">
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
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
      const width = 350;
      const height = 350;
    
      const svg = d3.select("#map")
        .append("svg")
        .attr("width", width)
        .attr("height", height);
    
      // 投影法（地球を2Dに写すための設定）
      const projection = d3.geoMercator()
        .center([136.0, 38.0]) // 日本の中心あたり
        .scale(980)
        .translate([width / 2, height / 2]);
    
      const path = d3.geoPath().projection(projection);
    
      // GeoJSONを読み込んで描画
      d3.json("https://raw.githubusercontent.com/dataofjapan/land/master/japan.geojson").then(function(data) {
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
      });
    });
    </script>
    