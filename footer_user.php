
    <div class="form-content">
        <div class="card-label">
            <a href="index.php">
                <img class="photo-footer" src="../../../app/assets/img/home.png"><h6>Home</h6>
            </a>
        </div>
        <div class="card-label">
            <a href="history.php">
                <img class="photo-footer" src="../../../app/assets/img/history.png"><h6>History</h6>
            </a>
        </div>
        <div class="card-label">
            <a href="notif.php">
                <img class="photo-footer" src="../../../app/assets/img/notif.png"><h6>Notif</h6>
            </a>
        </div>
        <div class="card-label">
            <a href="profil.php">
                <img class="photo-footer" src="../../../app/assets/img/User.png"><h6>Profil</h6>
            </a>
        </div>
    </div>
</div> 

<script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
</script>

<script>
$(document).ready(function () {
    $('#example').DataTable({
        scrollY: 340,
        scrollX: true,
    });
});
</script>

<script>
    $(document).ready(function () {
    $('#example1').DataTable({
        scrollX: true,
    });
});
</script>
<script>
    $(document).ready(function () {
    $('#example2').DataTable({
        scrollX: true,
    });
});
</script>

    
    <!-- <script src="script.js"></script>
    <script src="../../../app/assets/js/script.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="../../../app/assets/js/script1.js"></script> -->
</body>
</html>