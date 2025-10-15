<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Favorite</title>
    <link rel="stylesheet" href="">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body>
    <div class="container w-75 mb-5 mt-2">
        <form action="" method="">
            <div class="d-flex flex-wrap align-items-end">
                <div class="d-flex flex-column">
                    <input type="text" name="" id="" class="form-control me-3" placeholder="Search..." style="width: 523px;">
                </div>
                <div class="d-flex flex-column">
                    <label for="prefecture" class="form-label">Prefecture</label>
                    <select name="prefecture" id="prefecture" class="form-control me-3" style="width: 192px;">
                        <option value="">Prefecture</option>
                    </select>
                </div>
                <div class="d-flex flex-column">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control me-3" style="width: 192px;">
                        <option value="">Category</option>
                    </select>
                </div>
                <div class="d-flex flex-column">
                    <button class="btn custom-btn ms-auto"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                </div>
            </div>
        </form>
    </div>

    <br>

    <div class="container mx-auto mb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item text-center border topround custom-tab"><button class="btn m-0">Recommend</button></li>
            <li class="nav-item text-center border topround custom-tab"><button class="btn m-0">Most liked</button></li>
            <li class="nav-item text-center border topround custom-tab"><button class="btn m-0">Newest</button></li>
        </ul>
    </div>

    <div class="container w-100 mx-auto">
        <div class="row mb-5">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow m-2" style="color: #9F6B46">
                    <div class="card-body ratio ratio-1x1">
                        <img src="https://images.pexels.com/photos/1407325/pexels-photo-1407325.jpeg" alt="" class="img-fluid" style="border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row p-1 align-items-center mb-4">
                            <div class="col-7" style="font-size: 24px;">Title</div>
                            <div class="col-3 text-end"><i class="fa-regular fa-heart" style="font-size:18px;"></i><span style="font-size: 13px;">&nbsp;112</span></div>
                            <div class="col-2 text-end"><i class="fa-regular fa-star" style="font-size: 18px;"></i></div>
                        </div>
                        <div class="row px-1 py-2">
                            <div class="col d-flex align-items-end" style="font-size: 13px;">Oct-3-2025</div>
                            <div class="col d-flex justify-content-end align-items-end">
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3 me-1" style="background-color:#ECF9FF">category1</div>
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3" style="background-color:#ECF9FF ">category2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow m-2" style="color: #9F6B46">
                    <div class="card-body ratio ratio-1x1">
                        <img src="https://images.pexels.com/photos/1407325/pexels-photo-1407325.jpeg" alt="" class="img-fluid" style="border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row p-1 align-items-center mb-4">
                            <div class="col-7" style="font-size: 24px;">Title</div>
                            <div class="col-3 text-end"><i class="fa-regular fa-heart" style="font-size: 18px;"></i><span style="font-size: 13px;">&nbsp;112</span></div>
                            <div class="col-2 text-end"><i class="fa-regular fa-star" style="font-size: 18px;"></i></div>
                        </div>
                        <div class="row px-1 py-2">
                            <div class="col d-flex align-items-end" style="font-size: 13px;">Oct-3-2025</div>
                            <div class="col d-flex justify-content-end align-items-end">
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3 me-1" style="background-color:#ECF9FF">category1
                                </div>
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3" style="background-color:#ECF9FF ">category2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow m-2" style="color: #9F6B46">
                    <div class="card-body ratio ratio-1x1">
                        <img src="https://images.pexels.com/photos/1407325/pexels-photo-1407325.jpeg" alt="" class="img-fluid" style="border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row p-1 align-items-center mb-4">
                            <div class="col-7" style="font-size: 24px;">Title</div>
                            <div class="col-3 text-end"><i class="fa-regular fa-heart" style="font-size: 18px;"></i><span style="font-size: 13px;">&nbsp;112</span></div>
                            <div class="col-2 text-end"><i class="fa-regular fa-star" style="font-size: 18px;"></i></div>
                        </div>
                        <div class="row px-1 py-2">
                            <div class="col d-flex align-items-end" style="font-size: 13px;">Oct-3-2025</div>
                            <div class="col d-flex justify-content-end align-items-end">
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3 me-1" style="background-color:#ECF9FF">category1
                                </div>
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3" style="background-color:#ECF9FF ">category2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow m-2" style="color: #9F6B46">
                    <div class="card-body ratio ratio-1x1">
                        <img src="https://images.pexels.com/photos/1407325/pexels-photo-1407325.jpeg" alt="" class="img-fluid" style="border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row p-1 align-items-center mb-4">
                            <div class="col-7" style="font-size: 24px;">Title</div>
                            <div class="col-3 text-end"><i class="fa-regular fa-heart" style="font-size: 18px;"></i><span style="font-size: 13px;">&nbsp;112</span></div>
                            <div class="col-2 text-end"><i class="fa-regular fa-star" style="font-size: 18px;"></i></div>
                        </div>
                        <div class="row px-1 py-2">
                            <div class="col d-flex align-items-end" style="font-size: 13px;">Oct-3-2025</div>
                            <div class="col d-flex justify-content-end align-items-end">
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3 me-1" style="background-color:#ECF9FF">category1
                                </div>
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3" style="background-color:#ECF9FF ">category2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow m-2" style="color: #9F6B46">
                    <div class="card-body ratio ratio-1x1">
                        <img src="https://images.pexels.com/photos/1407325/pexels-photo-1407325.jpeg" alt="" class="img-fluid" style="border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row p-1 align-items-center mb-4">
                            <div class="col-7" style="font-size: 24px;">Title</div>
                            <div class="col-3 text-end"><i class="fa-regular fa-heart" style="font-size: 18px;"></i><span style="font-size: 13px;">&nbsp;112</span></div>
                            <div class="col-2 text-end"><i class="fa-regular fa-star" style="font-size: 18px;"></i></div>
                        </div>
                        <div class="row px-1 py-2">
                            <div class="col d-flex align-items-end" style="font-size: 13px;">Oct-3-2025</div>
                            <div class="col d-flex justify-content-end align-items-end">
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3 me-1" style="background-color:#ECF9FF">category1
                                </div>
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3" style="background-color:#ECF9FF ">category2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow m-2" style="color: #9F6B46">
                    <div class="card-body ratio ratio-1x1">
                        <img src="https://images.pexels.com/photos/1407325/pexels-photo-1407325.jpeg" alt="" class="img-fluid" style="border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row p-1 align-items-center mb-4">
                            <div class="col-7" style="font-size: 24px;">Title</div>
                            <div class="col-3 text-end"><i class="fa-regular fa-heart" style="font-size: 18px;"></i><span style="font-size: 13px;">&nbsp;112</span></div>
                            <div class="col-2 text-end"><i class="fa-regular fa-star" style="font-size: 18px;"></i></div>
                        </div>
                        <div class="row px-1 py-2">
                            <div class="col d-flex align-items-end" style="font-size: 13px;">Oct-3-2025</div>
                            <div class="col d-flex justify-content-end align-items-end">
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3 me-1" style="background-color:#ECF9FF">category1
                                </div>
                                <div class="d-inline-block border border-0 rounded-4 text-center py-1 px-3" style="background-color:#ECF9FF ">category2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto w-100 mb-3">
        <ul class="nav nav-tabs justify-content-center text-center border-bottom-0">
            <li class="nav-item border p-2 pagenate-character"><i class="fa-solid fa-angle-left"></i></li>
            <li class="nav-item border p-2 pagenate-number">1</li>
            <li class="nav-item border p-2 pagenate-number">2</li>
            <li class="nav-item border p-2 pagenate-number">3</li>
            <li class="nav-item border p-2 pagenate-number">4</li>
            <li class="nav-item border p-2 pagenate-character"><i class="fa-solid fa-angle-right"></i></li>
        </ul>
    </div>

</body>
</html>


