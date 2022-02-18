<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* basefront/base.html.twig */
class __TwigTemplate_aa37ea02b7e5637291198f9568f3673bc2f64ddd082e9fd8e6d4dd3f6adbb25d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
 ";
        // line 3
        $this->displayBlock('head', $context, $blocks);
        // line 32
        echo "    <body class=\"scrollspy-example\" data-bs-spy=\"scroll\" data-bs-target=\"#navbar\" data-bs-offset=\"0\" tabindex=\"0\">
     <header class=\"header\">
      <nav class=\"navbar navbar-expand-lg navbar-dark position-absolute w-100\" id=\"navbar\">
        <div class=\"container\"><a class=\"navbar-brand d-block d-lg-none\" href=\"";
        // line 35
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/logo.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"60\"></a>
          <button class=\"navbar-toggler navbar-toggler-end\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span></span><span></span><span></span></button>
          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav ms-auto\">
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">Home </a></li>
               <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 40
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("account");
        echo "\">Account</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 41
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("services");
        echo "\">Services</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 42
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("trips");
        echo "\">Trips</a></li>
            </ul>
            <ul class=\"navbar-nav d-none d-lg-block px-4\">
              <li class=\"nav-item m-0\"><a class=\"navbar-brand m-0\" href=\"#!\"><img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/logo.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"80\"></a></li>
            </ul>
            <ul class=\"navbar-nav me-auto\">
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 48
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("reservation");
        echo "\">Reservation</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 49
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("equipement");
        echo "\">Equipement</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 50
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("blog");
        echo "\">Blog</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"#contact\">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
     <!-- Hero Slider -->
    <section class=\"text-center pt-lg-0 hero-home\" id=\"hero\">
      <div class=\"swiper hero-slider\">
        <div class=\"swiper-wrapper\">
          <div class=\"swiper-slide hero-slide bg-cover py-5 with-border-image d-flex align-items-center\" style=\"background: url(Front/img/bg.png)\">
            <div class=\"container text-white py-5 my-5 index-forward\">
              <h1 class=\"text-uppercase text-xl mt-5\">Celestial</h1>
              <div class=\"row\">
                <div class=\"col-lg-7 mx-auto\">
                  <p class=\"lead\">We will provid you with all you need for a safe and fun space traveling experiance</p><a class=\"btn btn-primary px-4\" href=\"text.html\">Read More</a>
                </div>
              </div>
            </div>
          </div>
<!-- 
          <div class=\"swiper-slide hero-slide bg-cover py-5 with-border-image d-flex align-items-center\" style=\"background: url(Front/img/hero-bg-3.jpg)\">
            <div class=\"container text-white py-5 my-5 index-forward\">
              <h1 class=\"text-uppercase text-xl mt-5\">Celestial</h1>
              <div class=\"row\">
                <div class=\"col-lg-7 mx-auto\">
                  <p class=\"lead\">We will provid you with all you need for a safe and fun space traveling experiance</p><a class=\"btn btn-primary px-4\" href=\"text.html\">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <div class=\"swiper-slide hero-slide bg-cover py-5 with-border-image d-flex align-items-center\" style=\"background: url(Front/img/hero-bg-1.jpg)\">
            <div class=\"container text-white py-5 my-5 index-forward\">
              <h1 class=\"text-uppercase text-xl mt-5\">Celestial</h1>
              <div class=\"row\">
                <div class=\"col-lg-7 mx-auto\">
                  <p class=\"lead\">We will provid you with all you need for a safe and fun space traveling experiance</p><a class=\"btn btn-primary px-4\" href=\"text.html\">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"swiper-button-next swiper-nav-custom d-none d-lg-block\"></div>
        <div class=\"swiper-button-prev swiper-nav-custom d-none d-lg-block\"></div>
        <div class=\"swiper-pagination py-3 d-block d-lg-none\"></div>-->
      </div>
    </section>
    
        ";
        // line 101
        $this->displayBlock('body', $context, $blocks);
        // line 102
        echo "
          <!-- Scroll Top Button--><a class=\"scroll-top\" href=\"#\"><i class=\"fas fa-long-arrow-alt-up\"></i></a>
          ";
        // line 104
        $this->displayBlock('footer', $context, $blocks);
        // line 168
        echo "            ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 202
        echo "    </body>

</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <head>
        <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 10
        echo "       <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"robots\" content=\"all,follow\">
        ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "

    </head>
     ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Celestial";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 13
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 14
        echo "    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;display=swap\">
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Playfair+Display:500i&amp;display=swap\">
    <!-- Swiper slider-->
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/vendor/swiper/swiper-bundle.min.css"), "html", null, true);
        echo "\">
    <!-- theme stylesheet-->
    <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/css/style.violet.css"), "html", null, true);
        echo "\" id=\"theme-stylesheet\">
    <!-- Custom stylesheet - for your changes-->
  <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/css/custom.css"), "html", null, true);
        echo "\">
    <!-- Favicon-->
    <link rel=\"shortcut icon\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/logo.png"), "html", null, true);
        echo "\">
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.7.1/css/all.css\" integrity=\"sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr\" crossorigin=\"anonymous\">
            ";
        // line 27
        echo "        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 101
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 104
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 105
        echo "    <footer class=\"pt-5 text-white\" style=\"background: #111\">
      <div class=\"container pt-5\">
        <div class=\"row mb-5 pb-5\">
          <div class=\"col-md-4 col-sm-12\"><img class=\"mb-3\" src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/logo.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"140\">
            <p class=\"text-small text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>

          <div class=\"col-md-4 col-sm-12\">
            <h5 class=\"mb-4 mt-3\">Upcoming Trips</h5>
            <ul class=\"list-unstyled\">
              
          
              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 118
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">Home</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 122
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("account");
        echo "\">Account</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 126
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("services");
        echo "\">Services</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 130
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("trips");
        echo "\">Trips</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 134
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("reservation");
        echo "\">Reservation</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 138
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("equipement");
        echo "\">Equipement</a></h6>
              </li>

               <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"";
        // line 142
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("blog");
        echo "\">Blog</a></h6>
              </li>

               <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"#contact\">Contact</a></h6>
              </li>

            </ul>
          </div>

          <div class=\"col-md-4 col-sm-12\">
            <h5 class=\"mb-4 mt-3\">Newsletter</h5>
            <p class=\"text-small text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class=\"input-group\">
              <input class=\"form-control border-dark text-white rounded-0 bg-none\" type=\"search\" placeholder=\"Enter your email address\" aria-label=\"email address\" aria-describedby=\"button-addon2\">
              <button class=\"btn btn-primary px-4\" id=\"button-addon2\" type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button>
            </div>
          </div>
        </div>
        <div class=\"py-4 border-top border-dark text-center\">
          <p class=\"mb-0 text-muted\">Template designed by <a class=\"reset-anchor text-primary\" href=\"https://bootstrapious.com/p/cathedral-bootstrap-church-charity-template\">Bootstrap Temple</a>. </p>
          <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
        </div>
      </div>
    </footer>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 168
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 169
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/vendor/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/vendor/swiper/swiper-bundle.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 171
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/js/countdown.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 172
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/vendor/progressbar.js/progressbar.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 173
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/js/front.js"), "html", null, true);
        echo "\"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open(\"GET\", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement(\"div\");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
    </script>
    
            ";
        // line 201
        echo "        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "basefront/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  464 => 201,  434 => 173,  430 => 172,  426 => 171,  422 => 170,  417 => 169,  407 => 168,  371 => 142,  364 => 138,  357 => 134,  350 => 130,  343 => 126,  336 => 122,  329 => 118,  316 => 108,  311 => 105,  301 => 104,  283 => 101,  273 => 27,  267 => 23,  262 => 21,  257 => 19,  252 => 17,  247 => 14,  237 => 13,  218 => 7,  205 => 28,  203 => 13,  198 => 10,  194 => 7,  189 => 4,  179 => 3,  166 => 202,  163 => 168,  161 => 104,  157 => 102,  155 => 101,  101 => 50,  97 => 49,  93 => 48,  87 => 45,  81 => 42,  77 => 41,  73 => 40,  69 => 39,  60 => 35,  55 => 32,  53 => 3,  49 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
 {% block head %}
    <head>
        <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <title>{% block title %}Celestial{% endblock %}</title>
        {# Run `composer require symfony/webpack-encore-bundle`
           and uncomment the following Encore helpers to start using Symfony UX #}
       <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"robots\" content=\"all,follow\">
        {% block stylesheets %}
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;display=swap\">
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Playfair+Display:500i&amp;display=swap\">
    <!-- Swiper slider-->
    <link rel=\"stylesheet\" href=\"{{ asset ('Front/vendor/swiper/swiper-bundle.min.css')}}\">
    <!-- theme stylesheet-->
    <link rel=\"stylesheet\" href=\"{{ asset ('Front/css/style.violet.css')}}\" id=\"theme-stylesheet\">
    <!-- Custom stylesheet - for your changes-->
  <link rel=\"stylesheet\" href=\"{{ asset ('Front/css/custom.css')}}\">
    <!-- Favicon-->
    <link rel=\"shortcut icon\" href=\"{{ asset ('Front/img/logo.png')}}\">
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.7.1/css/all.css\" integrity=\"sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr\" crossorigin=\"anonymous\">
            {#{{ encore_entry_link_tags('app') }}#}
        {% endblock %}


    </head>
     {% endblock %}
    <body class=\"scrollspy-example\" data-bs-spy=\"scroll\" data-bs-target=\"#navbar\" data-bs-offset=\"0\" tabindex=\"0\">
     <header class=\"header\">
      <nav class=\"navbar navbar-expand-lg navbar-dark position-absolute w-100\" id=\"navbar\">
        <div class=\"container\"><a class=\"navbar-brand d-block d-lg-none\" href=\"{{path('home')}}\"><img src=\"{{ asset ('Front/img/logo.png')}}\" alt=\"...\" width=\"60\"></a>
          <button class=\"navbar-toggler navbar-toggler-end\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span></span><span></span><span></span></button>
          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav ms-auto\">
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('home')}}\">Home </a></li>
               <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('account')}}\">Account</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('services')}}\">Services</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('trips')}}\">Trips</a></li>
            </ul>
            <ul class=\"navbar-nav d-none d-lg-block px-4\">
              <li class=\"nav-item m-0\"><a class=\"navbar-brand m-0\" href=\"#!\"><img src=\"{{ asset ('Front/img/logo.png')}}\" alt=\"...\" width=\"80\"></a></li>
            </ul>
            <ul class=\"navbar-nav me-auto\">
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('reservation')}}\">Reservation</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('equipement')}}\">Equipement</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{path('blog')}}\">Blog</a></li>
              <li class=\"nav-item\"><a class=\"nav-link\" href=\"#contact\">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
     <!-- Hero Slider -->
    <section class=\"text-center pt-lg-0 hero-home\" id=\"hero\">
      <div class=\"swiper hero-slider\">
        <div class=\"swiper-wrapper\">
          <div class=\"swiper-slide hero-slide bg-cover py-5 with-border-image d-flex align-items-center\" style=\"background: url(Front/img/bg.png)\">
            <div class=\"container text-white py-5 my-5 index-forward\">
              <h1 class=\"text-uppercase text-xl mt-5\">Celestial</h1>
              <div class=\"row\">
                <div class=\"col-lg-7 mx-auto\">
                  <p class=\"lead\">We will provid you with all you need for a safe and fun space traveling experiance</p><a class=\"btn btn-primary px-4\" href=\"text.html\">Read More</a>
                </div>
              </div>
            </div>
          </div>
<!-- 
          <div class=\"swiper-slide hero-slide bg-cover py-5 with-border-image d-flex align-items-center\" style=\"background: url(Front/img/hero-bg-3.jpg)\">
            <div class=\"container text-white py-5 my-5 index-forward\">
              <h1 class=\"text-uppercase text-xl mt-5\">Celestial</h1>
              <div class=\"row\">
                <div class=\"col-lg-7 mx-auto\">
                  <p class=\"lead\">We will provid you with all you need for a safe and fun space traveling experiance</p><a class=\"btn btn-primary px-4\" href=\"text.html\">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <div class=\"swiper-slide hero-slide bg-cover py-5 with-border-image d-flex align-items-center\" style=\"background: url(Front/img/hero-bg-1.jpg)\">
            <div class=\"container text-white py-5 my-5 index-forward\">
              <h1 class=\"text-uppercase text-xl mt-5\">Celestial</h1>
              <div class=\"row\">
                <div class=\"col-lg-7 mx-auto\">
                  <p class=\"lead\">We will provid you with all you need for a safe and fun space traveling experiance</p><a class=\"btn btn-primary px-4\" href=\"text.html\">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"swiper-button-next swiper-nav-custom d-none d-lg-block\"></div>
        <div class=\"swiper-button-prev swiper-nav-custom d-none d-lg-block\"></div>
        <div class=\"swiper-pagination py-3 d-block d-lg-none\"></div>-->
      </div>
    </section>
    
        {% block body %}{% endblock %}

          <!-- Scroll Top Button--><a class=\"scroll-top\" href=\"#\"><i class=\"fas fa-long-arrow-alt-up\"></i></a>
          {% block footer %}
    <footer class=\"pt-5 text-white\" style=\"background: #111\">
      <div class=\"container pt-5\">
        <div class=\"row mb-5 pb-5\">
          <div class=\"col-md-4 col-sm-12\"><img class=\"mb-3\" src=\"{{ asset ('Front/img/logo.png')}}\" alt=\"...\" width=\"140\">
            <p class=\"text-small text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>

          <div class=\"col-md-4 col-sm-12\">
            <h5 class=\"mb-4 mt-3\">Upcoming Trips</h5>
            <ul class=\"list-unstyled\">
              
          
              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('home')}}\">Home</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('account')}}\">Account</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('services')}}\">Services</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('trips')}}\">Trips</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('reservation')}}\">Reservation</a></h6>
              </li>

              <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('equipement')}}\">Equipement</a></h6>
              </li>

               <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"{{path('blog')}}\">Blog</a></h6>
              </li>

               <li class=\"mb-2\">
                <h6 class=\"mb-1\"> <a class=\"reset-anchor text-primary\" href=\"#contact\">Contact</a></h6>
              </li>

            </ul>
          </div>

          <div class=\"col-md-4 col-sm-12\">
            <h5 class=\"mb-4 mt-3\">Newsletter</h5>
            <p class=\"text-small text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class=\"input-group\">
              <input class=\"form-control border-dark text-white rounded-0 bg-none\" type=\"search\" placeholder=\"Enter your email address\" aria-label=\"email address\" aria-describedby=\"button-addon2\">
              <button class=\"btn btn-primary px-4\" id=\"button-addon2\" type=\"submit\"><i class=\"fas fa-paper-plane\"></i></button>
            </div>
          </div>
        </div>
        <div class=\"py-4 border-top border-dark text-center\">
          <p class=\"mb-0 text-muted\">Template designed by <a class=\"reset-anchor text-primary\" href=\"https://bootstrapious.com/p/cathedral-bootstrap-church-charity-template\">Bootstrap Temple</a>. </p>
          <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
        </div>
      </div>
    </footer>
    {% endblock %}
            {% block javascripts %}
            <script src=\"{{ asset ('Front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}\"></script>
    <script src=\"{{ asset ('Front/vendor/swiper/swiper-bundle.min.js')}}\"></script>
    <script src=\"{{ asset ('Front/js/countdown.js')}}\"></script>
    <script src=\"{{ asset ('Front/vendor/progressbar.js/progressbar.js')}}\"></script>
    <script src=\"{{ asset ('Front/js/front.js')}}\"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open(\"GET\", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement(\"div\");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
    </script>
    
            {#{{ encore_entry_script_tags('app') }}#}
        {% endblock %}
    </body>

</html>
", "basefront/base.html.twig", "C:\\Users\\zeineb\\Documents\\GitHub\\d2\\Decipher\\templates\\basefront\\base.html.twig");
    }
}
