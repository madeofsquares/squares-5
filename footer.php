<?php $adminemail = get_option ( 'admin_email' ); ?>

<footer role="contentinfo">
    <p class="legal">Copyright &copy; <?php echo date( "Y" ); ?>. All rights reserved. For more information contact <a href="mailto:<?php echo $adminemail; ?>"><?php echo $adminemail; ?></a>.</p>
</footer>

</div> <!-- /wrapper -->

<?php wp_footer(); ?>

</body>
</html>