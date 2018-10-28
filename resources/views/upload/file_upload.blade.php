<style>

.file {
    position: relative;
}

.file label {
    background: #39D2B4;
    padding: 5px 20px;
    color: #fff;
    font-weight: bold;
    font-size: .9em;
    transition: all .4s;
}

.file input {
    position: absolute;
    display: inline-block;
    left: 0;
    top: 0;
    opacity: 0.01;
    cursor: pointer;
}

.file input:hover + label,
.file input:focus + label {
    background: #34495E;
    color: #39D2B4;
}

body {
    font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
    margin: 0px;
    background: #0e0e0e;
    background-position: left top;
    background-image: url(img/umbrella.png);
    background-repeat: no-repeat;
}

h1, h2 {
    margin-bottom: 5px;
    font-weight: normal;
    text-align: center;
    color:#aaa;
}

h2 {
    margin: 5px 0 2em;
    color: #1ABC9C;
}

form {
    width: 225px;
    margin: 0 auto;
    margin-top: 25%;
    text-align:center;
}

h2 + P {
    text-align: center;
}

.txtcenter {
    margin-top: 4em;
    font-size: .9em;
    text-align: center;
    color: #aaa;
}

.copy {
    margin-top: 2em;
}

.copy a {
    text-decoration: none;
    color: #1ABC9C;
}

</style>

<form action="/uploadfile" method="post" id="form" enctype="multipart/form-data">
    @csrf
    <p class="file">
        <input type="file" class="form-control-file" name="file" id="file" aria-describedby="fileHelp">
        <label for="file">???</label>
    </p>
</form>

<script>
    document.getElementById("file").onchange = function() {
        document.getElementById("form").submit();
    };
</script>
