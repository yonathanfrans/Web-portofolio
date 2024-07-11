<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    <header class="navbar-container">
        <nav class="navbar-nav">
            <div class="logo">
              <img src="assets/img/logo.png" alt="logo">
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About Me</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li>
                      <div id="dark-toggle">
                        <i id="dark-icon" class='bx bxs-moon'></i>
                      </div>
                    </li>
                </ul>
            </div>

            <div id="hamburger-menu">
              <i class='bx bx-menu'></i>
            </div>

        </nav>
    </header>

    <main>
        <section id="profile">
            <div class="hero-profile">
              <h3 class="profile-h3">Hello, I'm</h3>
              <h1 class="profile-name">{{ $hero_firstName }} <span>{{ $hero_lastName }}</span></h1>
              <p class="profile-text">{{ $hero->content }}</p>
            </div>
            <div class="picture-box">
                <div class="profile-pic">
                  <img src="assets/img/profile.png" alt="profile picture" />
                </div>
                <div class="picture-shadow"></div>
            </div>
         </section>

          <section id="about">
            <p class="about-p">Get To Know More</p>
            <h1 class="about-title">About Me</h1>       
                <div class="about-containers">
                  <div class="box-containers">
                    <div class="about-box achievement">
                      <i class='bx bxs-award' style="color: #FFD700;"></i>
                      <h3>Achievement</h3>
                      <p data-achievement="{{ asset($about->path) }}">{{ $about->achievement }}</p>
                    </div>
                    <div class="about-box">
                      <i class='bx bxs-graduation' style="color: #0000FF;"></i>
                      <h3>Education</h3>
                      <p>Gunadarma University<br />Information Systems</p>
                    </div>
                  </div>
                  <div class="about-details">
                    <p>
                      {{ $contentPart1 }}
                      <span class="more-content"> {{ $contentPart2 }}</span>
                      <span class="read-more-btn" onclick="toggleReadMore()"> Read more</span>
                      <span class="read-less-btn" onclick="toggleReadMore()" style="display: none;"> Read less</span>
                    </p>
                  </div>
                </div>
          </section>

          <section id="skills">
              <p class="skills-p">Explore My</p>
              <h1 class="skills-title">Skills</h1>
                <div class="skills-containers">
                  <div class="box-containers skill">
                    <div class="skill-box">
                      <h2 class="skills-subtitle">Frontend Development</h2>
                        <div class="article-container">
                        @foreach ($skillFrontend as $frontend) 
                          <article>
                            <i class='bx bxs-check-circle'></i>
                            <div>
                              <h3>{{ $frontend->name }}</h3>
                              <p>{{ $frontend->level }}</p>
                            </div>
                          </article>
                        @endforeach
                          
                        </div>
                    </div>

                    <div class="skill-box">
                      <h2 class="skills-subtitle">Backend Development</h2>
                        <div class="article-container">
                        @foreach ($skillBackend as $backend) 
                          <article>
                            <i class='bx bxs-check-circle'></i>
                            <div>
                              <h3>{{ $backend->name }}</h3>
                              <p>{{ $backend->level }}</p>
                            </div>
                          </article>
                        @endforeach

                        </div>
                    </div>
                  </div>
                </div>
            </section>

            <section id="projects">
              <p class="projects-p">My Recents</p>
              <h1 class="projects-title">Projects</h1>
                <div class="projects-containers">
                @foreach ($projects as $project)
                    <div class="projects-box">
                      <div class="project-cover">
                        <img src="{{ asset($project->image) }}" alt="Project {{ $project->id }}" />
                      </div>
                      <div class="project-info">
                        <div class="project-subtitle">
                          <h4>{{ $project->title }}</h4>
                          <a href="{{ $project->link }}"><i class='bx bx-link-external'></i></a>
                        </div>
                        <div class="project-tags">
                          <?php
                           $tools = json_decode($project->tools);
                           foreach($tools as $tool) :
                          ?>
                          <div>
                            <i class='{{ $tool->icon }}' style="color: {{ $tool->color }};"></i>
                          </div>
                  
                          <?php endforeach; ?>
                    
                        </div>
                        <p>
                          {{ $project->content }}
                        </p>
                      </div>
                    </div>
                  @endforeach
              
                </div>
            </section>

            <section id="contact">
              <p class="contact-p">Get in Touch</p>
              <h1 class="contact-title">My Contact</h1>
                <div class="contact-containers">
                  @foreach ($contacts as $contact)

                  <div class="contact-detail">
                    <a href="{{ $contact->link }}">
                    <?php
                           $icons = json_decode($contact->icon);
                           foreach($icons as $icon) :
                          ?>
                          <i class='{{ $icon->icon }}' style="color: {{ $icon->color }};"></i>
                  
                          <?php endforeach; ?>
                    </a>
                    <a href="{{ $contact->link }}">{{ $contact->name }}</a>
                  </div>

                  @endforeach
                  
                </div>
            </section>
      </main>

      <footer>
        <hr>
        <div class="navbar-container">
          <nav class="navbar-nav">
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About Me</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
          </nav>
        </div>
        <p>Copyright &#169; 2023 Yonathan Fransiscus. All Rights Reserved.</p>
      </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>