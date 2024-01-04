<footer class="footer pt-5">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-12">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Services</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</main>

<?php include 'js_links.php' ?>


<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/perfect-scrollbar.min.js"></script>
<script src="../assets/js/smooth-scrollbar.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get references to the toggle buttons and collapsible content
    var toggleButtons = document.querySelectorAll('.btn-toggle');
    var collapsibleContents = document.querySelectorAll('.collapse');

    // Add a click event listener to each toggle button
    toggleButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        // Get the target collapsible content using data-bs-target attribute
        var targetId = button.getAttribute('data-bs-target');
        var collapsibleContent = document.querySelector(targetId);

        // Toggle the 'show' class on the collapsible content
        collapsibleContent.classList.toggle('show');

        // Update the 'aria-expanded' attribute of the button
        var expanded = collapsibleContent.classList.contains('show');
        button.setAttribute('aria-expanded', expanded);
      });
    });
  });
</script>
</body>

</html>