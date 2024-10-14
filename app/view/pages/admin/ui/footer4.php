<script type="text/javascript">
var app = {
    code: '0'
};

$('[data-load-code]').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var code = $this.data('load-code');
    if (code) {
        $($this.data('remote-target')).load('../ui/header.php?page=detail&code=' + code);
        app.code = code;
    }
});
</script>