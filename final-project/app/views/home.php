


  <!-- Header Section -->
  <header class="header">
    <a href="#" class="logo"><span>Fahad Khan</span></a>

    <ul class="nav-links">
      <li><a href="#about">About</a></li>
      <li><a href="#experience">Experience</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <i class="fa-solid fa-bars" id="menu-icon"></i>

    <button class="visit-btn"><a href="https://github.com/fahadk011" target="_blank">Visit Github</a></button>
  </header>
  
  <!-- About Section -->
  <section class="about" id="about">
    <div class="about-container">
      <img src="images/your-photo.jpg" alt="Fahad Khan" />

      <div class="info-box">
        <div class="text">
          <h3>Hi, I'm</h3>
          <h1>Fahad Khan</h1>
          <span>Software Engineer | Frontend Developer</span>
        </div>

        <div class="btn-group">
          <a href="FahadKhanResume.pdf" class="btn" target="_blank">Download CV</a>
          <a href="#contact" class="btn">Contact</a>
        </div>

        <div class="socials">
          <a href="https://github.com/fahadk011" target="_blank"><i class="fa-brands fa-github"></i></a>
          <a href="https://linkedin.com/in/fahad-khan-501181216/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Experience Section -->
<section class="experience" id="experience">
    <h2 class="section-title">Experience</h2>

    <div class="experience-info">
      <div class="grid">
        
        <?php
            foreach ($experiences as $experience) {
                $this->loadView('fragment_experience.php', array('experience' => $experience)); 
            }
        ?>
        
      </div>
    </div>
  </section>


  <!-- Projects Section -->
  <section class="projects" id="projects">
    <h2 class="section-title">Recent Projects</h2>

    <div class="projects-grid">
      <div class="project-card">
        <img src="images/project1.jpg" alt="Project 1">
        <h3>Portfolio Website</h3>
        <p>Designed and developed a responsive personal portfolio website using HTML, CSS, and JavaScript to showcase skills and projects.</p>
        <div class="btn-group">
          <a href="#" class="btn">Live Demo</a>
          <a href="https://github.com/fahadk011/portfolio" class="btn">Github Repo</a>
        </div>
      </div>

      <div class="project-card">
        <img src="images/project2.jpg" alt="Project 2">
        <h3>Task Management Tool</h3>
        <p>Built a task management system for tracking team progress using React.js, Node.js, and MongoDB. Integrated authentication and role-based access.</p>
        <div class="btn-group">
          <a href="#" class="btn">Live Demo</a>
          <a href="https://github.com/fahadk011/task-manager" class="btn">Github Repo</a>
        </div>
      </div>
    </div>
  </section>

    <!-- Contact Section -->
  <section class="contact" id="contact">
    <div class="input-box">
      <h2 class="section-title">Contact Me</h2>
      <div id="success-message"></div>
      <div id="error-message"></div>
      <form id="contact-form">
        <input id="contact-name" type="text" name="name" placeholder="Your Name" required>
        <input id="contact-email" type="email" name="email" placeholder="Your Email" required>
        <textarea id="contact-message" name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>

    <!-- Footer -->
    <footer>
    <ul>
      <li><a href="#experience">Experience</a></li>
      <li><a href="./contact">Contacts List</a></li>
    </ul>
    <p class="copyright">© 2024 Fahad Khan. All Rights Reserved.</p>
  </footer>
  <script>
    $(document).ready(function(){
      $("#contact-form").on('submit',function(event){
        event.preventDefault();

        const name = $("#contact-name").val();
        const email = $("#contact-email").val();
        const message = $("#contact-message").val();
        const data = {name, email, message};

        $.ajax({
          url: "./contact", // URL to send the request to
          type: "POST", // HTTP method: GET, POST, etc.
          data: data, // Data to send to the servere
          dataType: "json", // Expected response data type
          success: function(response) {
              console.log(response);

              if(response.status === 'success') {
                  $("#contact-name").val("");
                  $("#contact-email").val("");
                  $("#contact-message").val("");

                  $("#success-message").text(response.message);
                  $("#error-message").text("");
                  alert("Contact saved successfully. I will contact you soon.")
              }else{
                  $("#error-message").text(response.message);
                  $("#success-message").text("");
              }

              setTimeout(function(){
                  $("#success-message").text("");
                  $("#error-message").text("");
              }, 5000);

          },
          error: function(xhr, status, error) {
              // This function runs when the request fails
              console.error("XHR:", xhr);
              console.error("Response Text:", xhr.responseText);
          }
      });

      });
    });
  </script>

