  <?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

require 'env/koneksi.php';
require 'env/tgl_indo.php';
 

?>
<?php
// simpan file ini sebagai chatgpt_api.php
$apiKey = "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";
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

$message = $data['message'];

$url = "https://api.openai.com/v1/chat/completions";

$payload = [
    "model" => "gpt-3.5-turbo",
    "messages" => [
        ["role" => "system", "content" => "You are a helpful assistant."],
        ["role" => "user", "content" => $message]
    ],
    "max_tokens" => 50 // Batasi jumlah token dalam respons
];


$headers = [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>

<div class="row">
    <div class="col-12">
        <div class="chat-box-left">
            <ul class="nav nav-tabs mb-3 nav-justified" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="general_chat_tab" data-bs-toggle="tab" href="#general_chat" role="tab">General</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="group_chat_tab" data-bs-toggle="tab" href="#group_chat" role="tab">Groups</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="personal_chat_tab" data-bs-toggle="tab" href="#personal_chat" role="tab">Personal</a>
                </li>
            </ul>
            <div class="chat-search mb-3">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="chat-search" name="chat-search" class="form-control" placeholder="Search">
                        <button type="button" class="btn btn-de-primary shadow-none"><i class="la la-search"></i></button>
                    </div>
                </div>
            </div>
            <!--end chat-search-->
            <div class="chat-body-left" data-simplebar>

                
            </div>
        </div>
        <!--end chat-box-left -->
        <div class="chat-box-right">
            <div class="chat-header">
                <a href="" class="media">
                    <div class="media-left">
                        <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-sm">
                    </div><!-- media-left -->
                    <div class="media-body">
                        <div>
                            <h6 class="m-0">Mary Schneider</h6>
                            <p class="mb-0">Last seen: 2 hours ago</p>
                        </div>
                    </div><!-- end media-body -->
                </a>
                <!--end media-->
                <div class="chat-features">
                    <div class="d-none d-sm-inline-block">
                        <a href=""><i class="la la-phone"></i></a>
                        <a href=""><i class="la la-video"></i></a>
                        <a href=""><i class="la la-trash-alt"></i></a>
                        <a href=""><i class="la la-ellipsis-v"></i></a>
                    </div>
                </div><!-- end chat-features -->
            </div><!-- end chat-header -->
            <div class="chat-body" data-simplebar>
                <div class="chat-detail">
                    <div class="media">
                        <div class="media-img">
                            <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-sm">
                        </div>
                        <div class="media-body">
                            <div class="chat-msg">
                                <p>Good Morning !</p>
                            </div>
                            <div class="chat-msg">
                                <p>There are many variations of passages of Lorem Ipsum available.</p>
                            </div>
                            <div class="chat-time">9:02am</div>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                    <div class="media">
                        <div class="media-body reverse">
                            <div class="chat-msg">
                                <p>Good Morning !</p>
                            </div>
                            <div class="chat-msg">
                                <p>There are many variations of passages of Lorem Ipsum available.</p>
                            </div>
                        </div>
                        <!--end media-body-->
                        <div class="media-img">
                            <img src="assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-sm">
                        </div>
                    </div>
                    <!--end media-->
                    <div class="media">
                        <div class="media-img">
                            <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-sm">
                        </div>
                        <div class="media-body">
                            <div class="chat-msg">
                                <p>There are many variations of passages of Lorem Ipsum available.</p>
                            </div>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                    <div class="media">
                        <div class="media-body reverse">
                            <div class="chat-msg">
                                <p>Good Morning !</p>
                            </div>
                            <div class="chat-msg">
                                <p>It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout.
                                    The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here.
                                </p>
                            </div>
                        </div>
                        <!--end media-body-->
                        <div class="media-img">
                            <img src="assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-sm">
                        </div>
                    </div>
                    <!--end media-->
                    <div class="media">
                        <div class="media-img">
                            <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-sm">
                        </div>
                        <div class="media-body">
                            <div class="chat-msg">
                                <p>Good Morning !</p>
                            </div>
                            <div class="chat-msg">
                                <p>It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout.
                                    The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here.
                                </p>
                            </div>
                            <div class="chat-msg">
                                <p>Ok</p>
                            </div>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                    <div class="media">
                        <div class="media-body reverse">
                            <div class="chat-msg">
                                <p>Good Morning !</p>
                            </div>
                            <div class="chat-msg">
                                <p>There are many variations of passages of Lorem Ipsum available.</p>
                            </div>
                            <div class="chat-msg">
                                <p>There are many variations of passages.</p>
                            </div>
                            <div class="chat-msg">
                                <p>By</p>
                            </div>
                        </div>
                        <!--end media-body-->
                        <div class="media-img">
                            <img src="assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-sm">
                        </div>
                    </div>
                    <!--end media-->
                </div> <!-- end chat-detail -->
            </div><!-- end chat-body -->
            <div class="chat-footer">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <span class="chat-admin"><img src="assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-sm"></span>
                        <input type="text" class="form-control" placeholder="Type something here...">
                    </div><!-- col-8 -->
                    <div class="col-3 text-end">
                        <div class="d-none d-sm-inline-block chat-features">
                            <a href=""><i class="la la-camera"></i></a>
                            <a href=""><i class="la la-paperclip"></i></a>
                            <a href=""><i class="la la-microphone"></i></a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end chat-footer -->
        </div>
        <!--end chat-box-right -->
    </div>
</div>