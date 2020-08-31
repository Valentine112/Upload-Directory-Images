
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .preview{
            left: 0;
            right: 0;
            max-width: 80%;
            max-height: 40vh;
            margin: auto;
        }
    </style>
</head>
<body>
    <form enctype="multipart/form-data" method="post" onsubmit="event.preventDefault(); event.stopPropagation()">
        <img src="" alt="" class="preview" id="preview">
        <div id="hold">
            <input type="file" name="image[]" id="dir" webkitdirectory directory multiple>
        </div>
        <button name="btn" onclick="upload(this)">Submit</button>
    </form>
</body>
<script>
        
    function upload(me) {
        var prev = document.getElementById("dir").files
        var formData = new FormData()
        var xml = new XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP")
        Array.from(prev).forEach(img => {
            formData.append("dir[]", img)
        })
        xml.upload.addEventListener("progress", progressHandler, false);
        xml.addEventListener("load", loaded, false)
        xml.open("POST", "post.php")
        xml.send(formData)
    }

    function loaded(ev) {
        console.log(ev.target.responseText)
    }

    function progressHandler(ev) {
        //console.log(ev)
    }
</script>
</html>