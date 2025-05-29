<!-- @extends('layouts.master')
@section('content') -->
<!DOCTYPE html>
<html>
<style>
    .input_msg_write {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        background: #f7f7f7;
        border-top: 1px solid #ddd;
        border-radius: 0 0 6px 6px;
        flex-wrap: wrap;
    }

    .write_msg {
        flex: 1;
        padding: 10px 15px;
        border-radius: 20px;
        border: 1px solid #ccc;
        font-size: 14px;
        outline: none;
        transition: border-color 0.3s;
    }

    .write_msg:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }

    #attachFilesBtn {
        background: transparent;
        border: none;
        color: #555;
        font-size: 20px;
        cursor: pointer;
        transition: color 0.3s;
    }

    #attachFilesBtn:hover {
        color: #4a90e2;
    }

    .msg_send_btn {
        background: #4a90e2;
        border: none;
        color: white;
        font-size: 20px;
        padding: 10px 16px;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .msg_send_btn:hover {
        background-color: #357ABD;
    }

    #fileInput {
        display: none;
    }

    /* Preview container */
    #filePreview {
        display: flex;
        gap: 8px;
        margin-top: 8px;
        flex-wrap: wrap;
    }

    .file-preview-item {
        position: relative;
        width: 50px;
        height: 50px;
        border-radius: 6px;
        overflow: hidden;
        border: 1px solid #ddd;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .file-preview-item img,
    .file-preview-item video {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .file-preview-remove {
        position: absolute;
        top: -6px;
        right: -6px;
        background: #e74c3c;
        color: white;
        border-radius: 50%;
        font-size: 12px;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        cursor: pointer;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }
</style>

<head>
    <title>Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/chat.css" />
</head>

<body>
    <div class="container">
        <h3 class="text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                                <span class="input-group-addon">
                                    <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        @foreach($users as $user)
                        <div class="chat_list" data-user-id="{{ $user->id }}">
                            <div class="chat_people">
                                <div class="chat_img">
                                    <img src="{{ $user->profile_photo_url ?? 'https://ptetutorials.com/images/user-profile.png' }}" alt="{{ $user->name }}">
                                </div>
                                <div class="chat_ib">
                                    <h5>{{ $user->name }}</h5>
                                    <p>Click to start chat</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history"></div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <input type="file" id="fileInput" />
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        let token = localStorage.getItem('auth_token');
        let receiver_id = null;

        // Show file selector when attach icon clicked
        $('#attachFilesBtn').click(function() {
            $('#fileInput').click();
        });

        // Load messages when user clicked
        $(document).on('click', '.chat_list', function() {
            receiver_id = $(this).data('user-id');
            lastMessageId = 0;
            $('.msg_history').html('');
            loadMessages(receiver_id);
        });

        let lastMessageId = 0;

        function loadMessages(userId) {
            $.ajax({
                url: '/api/messages/' + userId,
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function(data) {
                    $('.msg_history').html('');
                    data.forEach(msg => {
                        if (msg.id > lastMessageId) { // Only new messages
                            let html = '';

                            if (msg.file_path) {
                                // Generate file URL
                                let fileUrl = '/storage/' + msg.file_path;

                                // Check mime type to show preview or download link
                                if (msg.file_type.startsWith('image/')) {
                                    html = `<div class="${msg.sender_id == {{ auth()->id() }} ? 'outgoing_msg' : 'incoming_msg'}">
                    <div class="${msg.sender_id == {{ auth()->id() }} ? 'sent_msg' : 'received_msg'}">
                        <img src="${fileUrl}" style="max-width:200px; max-height:200px;" />
                        <span class="time_date">${msg.created_at}</span>
                    </div>
                </div>`;
                                } else if (msg.file_type.startsWith('video/')) {
                                    html = `<div class="${msg.sender_id == {{ auth()->id() }} ? 'outgoing_msg' : 'incoming_msg'}">
                    <div class="${msg.sender_id == {{ auth()->id() }} ? 'sent_msg' : 'received_msg'}">
                        <video width="250" controls>
                            <source src="${fileUrl}" type="${msg.file_type}">
                            Your browser does not support the video tag.
                        </video>
                        <span class="time_date">${msg.created_at}</span>
                    </div>
                </div>`;
                                } else {
                                    // Other file types show download link with filename
                                    let fileName = fileUrl.split('/').pop();
                                    html = `<div class="${msg.sender_id == {{ auth()->id() }} ? 'outgoing_msg' : 'incoming_msg'}">
                    <div class="${msg.sender_id == {{ auth()->id() }} ? 'sent_msg' : 'received_msg'}">
                        <a href="${fileUrl}" download>${fileName}</a>
                        <span class="time_date">${msg.created_at}</span>
                    </div>
                </div>`;
                                }
                            } else {
                                // Plain text message
                                if (msg.sender_id == {
                                        {
                                            auth() - > id()
                                        }
                                    }) {
                                    html = `<div class="outgoing_msg">
                    <div class="sent_msg">
                        <p>${msg.message}</p>
                        <span class="time_date">${msg.created_at}</span>
                    </div>
                </div>`;
                                } else {
                                    html = `<div class="incoming_msg">
                    <div class="incoming_msg_img"> 
                        <img src="https://ptetutorials.com/images/user-profile.png"> 
                    </div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>${msg.message}</p>
                            <span class="time_date">${msg.created_at}</span>
                        </div>
                    </div>
                </div>`;
                                }
                            }

                            $('.msg_history').append(html);
                            lastMessageId = msg.id;
                        }
                    });

                    $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
                },
                error: function(xhr) {
                    console.log("Error loading messages:", xhr.responseJSON);
                }
            });
        }

        // Send message & files
        $('.msg_send_btn').click(function() {
            const msg = $('.write_msg').val().trim();
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];

            if (!msg && !file) return; // no message or file, do nothing
            if (!receiver_id) return;

            let formData = new FormData();
            formData.append('receiver_id', receiver_id);
            formData.append('message', msg);

            if (file) {
                formData.append('file', file);
            }

            $.ajax({
                url: '/api/messages/send',
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function() {
                    $('.write_msg').val('');
                    $('#fileInput').val('');
                    loadMessages(receiver_id);
                },
                error: function(xhr) {
                    console.log("Send error:", xhr.responseJSON);
                }
            });
        });
    </script>
</body>

</html>
<!-- @endsection -->