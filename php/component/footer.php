<div class="footer">
    <!-- <span>© 2024 il tuo nome</span> -->
    <span>
        Powered By 
        <a href="https://github.com/ma13w/EasyPHPBlog" target="_blank">ma13w</a>
    </span>
</div>

<script>
    var bodyHeight = document.body.scrollHeight;
    var viewportHeight = window.innerHeight
    if(bodyHeight > viewportHeight){
        document.querySelector(".footer").style.position = "static";
    }else{
        document.querySelector(".footer").style.position = "absolute";
    }
</script>
