<?php if(!empty($this->session->has_userdata('succes'))) {?>
      <script>
        Swal.fire(
            'Good job!',
            '<?=$this->session->flashdata('succes')?>',
            'success'
          )
      </script>
<?php } ?>

<?php if(!empty($this->session->has_userdata('error'))) {?>
      <script>
          Swal.fire(
              'Oops...!',
              '<?=$this->session->flashdata('error')?>',
              'error'
            )
       </script>
<?php } ?>

<?php if(!empty($this->session->has_userdata('warning'))) {?>
      <script>
          Swal.fire(
              'Stop...!',
              '<?=$this->session->flashdata('warning')?>',
              'warning'
            )
       </script>
<?php } ?>

