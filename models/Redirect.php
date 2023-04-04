<?php
class Redirect
{
    static public function to($page)
    {
        header("location:$page");
    }
    static public function withPost($page, $id, $message = null)
    {
?>
        <form method="post" action="<?= $page ?>" id="redirectForm">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="message" value="<?= $message ?>">
        </form>
        <script type="text/javascript">
            document.getElementById("redirectForm").submit();
        </script>
<?php
    }
}
