<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-4">
                <div class="container-fluid w-100">
                    <h2 class="mb-0" style="font-size: 32px;">Talking Users</h2>
                
                    <form action="" method="">
                        <div class="d-flex flex-wrap mb-3 mt-2">
                            <div class="d-flex flex-column">
                                <input type="text" name="" id="" class="form-control me-4" placeholder="Search User..." style="width: 267px;">
                            </div>
                            <div class="d-flex flex-column ms-auto">
                                <button class="btn custom-btn"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                            </div>
                        </div>
                    </form>

                    <div class="d-flex align-items-center rounded-3 p-3 message-users">
                        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:75px; height:75px;">

                        <div class="d-flex flex-column align-items-start">
                            <h6 class="mb-4 fw-bold">USER 1</h6>
                            
                            <p class="mb-0" style="font-size: 13px; font-weight:300;">This is text.</p>
                        </div>
                        
                        <div class="ms-auto d-flex align-items-center justify-content-center rounded notice" style="width:41px; height:38px;">
                            1
                        </div>
                    </div>
                    <div class="d-flex align-items-center rounded-3 p-3 message-users">
                        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:75px; height:75px;">

                        <div class="d-flex flex-column align-items-start">
                            <h6 class="mb-4 fw-bold">USER 2</h6>
                            
                            <p class="mb-0" style="font-size: 13px; font-weight:300;">This is text.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center rounded-3 p-3 message-users">
                        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:75px; height:75px;">

                        <div class="d-flex flex-column align-items-start">
                            <h6 class="mb-4 fw-bold">USER 3</h6>
                            
                            <p class="mb-0" style="font-size: 13px; font-weight:300;">Talking with someone.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center rounded-3 p-3 message-users">
                        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:75px; height:75px;">

                        <div class="d-flex flex-column align-items-start">
                            <h6 class="mb-4 fw-bold">USER 4</h6>
                            
                            <p class="mb-0" style="font-size: 13px; font-weight:300;">This is text.</p>
                        </div>

                        <div class="ms-auto d-flex align-items-center justify-content-center rounded notice" style="width:41px; height:38px;">
                            3
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center rounded-3 p-3 message-users">
                        <i class="fa-regular fa-square-plus" style="font-size: 50px;"></i>
                    </div>
                </div>
                
            </div>
            <div class="col-8">
                <div class="position-relative mb-2" style="width: 800px; height:50px">

                    <div class="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center rounded"
                        style="background-color: #f1bdb2; color:#ffffff; width:330px; height:50px;">
                        <h2 class="mb-0" style="font-size:24px;">Talking with USER 3</h2>
                    </div>

                    <div class="position-absolute top-50 end-0 translate-middle-y d-flex align-items-center" style="color: #f1bdb2;">
                        <span style="font-size: 16px;">Delete</span>&nbsp;
                        <i class="fa-solid fa-trash" style="font-size:35px;"></i>
                    </div>

                </div>

                <div class="message-board mb-2 rounded" style="">

                </div>

                <div class="d-flex" style="width:800px;">
                    <div class="d-flex flex-column me-4" style="width: 563px">
                        <input type="text" name="message" id="massage" class="form-control" placeholder="Enter a message">
                    </div>
                    
                    <div class="d-flex flex-column me-4">
                        <button class="btn custom-btn">Send</button>
                    </div>

                    <div class="d-flex" style="color: #f1bdb2;">
                        <i class="fa-regular fa-face-smile me-4" style="font-size: 38px;"></i>
                        <i class="fa-solid fa-image" style="font-size: 38px;"></i>
                    </div>
                </div>
            
            </div>
        </div>
    </div>


</body>
</html>