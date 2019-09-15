        </div>
    </div>

    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery-ui.min.js'; ?>"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("input[name='date']").datepicker({minDate:10,dateFormat:"yy-mm-dd"});
      })
    </script>
</body>
</html>
