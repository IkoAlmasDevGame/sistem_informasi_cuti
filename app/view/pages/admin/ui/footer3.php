<script>
var app = {
    code: '0'
};

$('[data-load-npp]').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var npp = $this.data('load-npp');
    if (npp) {
        $($this.data('remote-target')).load('../ui/header.php?page=detail&code=' + npp);
        app.npp = npp;
    }
});
</script>