<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EVENT KANRI</title>
</head>

<body>
    <div class="wrapper event-create-wrapper">
        <header class="event-create-header">
            <h2>EVENT LIST</h2>
            <a class="back-homepage" href="../../index.php">
                < Homepage</a>
        </header>
        <div class="content">
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
                <div class="input-field-container">
                    <div class="event-name-input" id="event-name-input">
                        <label class="event-label" id="event-name-label" for="">Event name</label>
                        <input type="text" name="event-name" class="event-name event-input" id="event-name"
                            onblur="checkValidateEvent()">
                    </div>
                    <div class="slogan-input" id="slogan-input">
                        <label class="event-label" id="logan-label" for="">Slogan</label>
                        <input type="text" name="slogan" class="slogan event-input" id="slogan"
                            onblur="checkValidateEvent()">
                    </div>
                    <div class="leader-input" id="leader-input">
                        <label class="event-label" id="leader-label" for="">Leader</label>
                        <input type="text" name="leader" class="leader event-input" id="leader"
                            onblur="checkValidateEvent()">
                    </div>
                    <div class="description-input" id="description-input">
                        <label class="event-label" id="description-label" for="">Description</label>
                        <textarea name="description" class="description event-input" id="description" rows="5" cols="50"
                            onblur="checkValidateEvent()"></textarea>
                    </div>
                    <div class="avatar-input" id="avatar-input">
                        <label class="event-label" id="avatar-label" for="">Avatar</label>
                        <label class="img-label" for="avatar-img">
                            <i class="fa-regular fa-image"></i>
                            <input id="avatar-img" type="file" name="avatar" class="avatar hover"
                                accept="image/png, image/jpg, image/gif, image/jpeg" onblur="checkValidateEvent()">
                        </label>
                    </div>
                    <input type="submit" name="event-submit" class="event-submit-btn hover" value="Create"
                        id="event-submit-btn" onclick="checkValidateEvent()">
                </div>
            </form>
        </div>
    </div>
    <script src="../../assets/main.js"></script>
</body>

</html>