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

/* basefront/home.html.twig */
class __TwigTemplate_41043117f197cb3df76f6571b14ea92572104da2974f4024da54e5c0d743c6c4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "basefront/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/home.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/home.html.twig"));

        $this->parent = $this->loadTemplate("basefront/base.html.twig", "basefront/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo " <!-- Services Section -->
    <section class=\"py-5\" id=\"services\">
      <div class=\"container py-5\">
        <header class=\"mb-4 text-center mb-5\">
          <p class=\"text-serif mb-0 text-primary\">Watch our offers online</p>
          <h2 class=\"text-uppercase\">Our offers        </h2>
        </header>
        <div class=\"row text-center gy-4\">
          <div class=\"col-lg-4\"><img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/global.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"100\">
            <h3 class=\"h5\">Lorem ipsum dolor</h3>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/astronaut.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"100\">
            <h3 class=\"h5\">Lorem ipsum dolor</h3>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/travel.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"100\">
            <h3 class=\"h5\">Special events</h3>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
        </div>
      </div>
    </section>
      <!-- Works Section-->
    <section id=\"works\">
      <div class=\"container-fluid px-0\">
        <div class=\"row align-items-stretch\">
          <div class=\"col-lg-6 half-page-banner bg-cover\" style=\"background: url(Front/img/lyndsey.jpg)\"></div>
          <div class=\"col-lg-6 bg-light py-lg-5\">
            <div class=\"h-100 d-flex flex-column p-5 justify-content-center\">
              <p class=\"text-serif text-primary mb-0\">Where to find us</p>
              <h2 class=\"text-uppercase\">Our work</h2>
              <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
              <ul class=\"list-check ps-0\">
                <li>
                  <p class=\"mb-0 text-muted mb-2\">Eu vim atqui ludus petentium, suas idque est id. </p>
                </li>
                <li>
                  <p class=\"mb-0 text-muted mb-2\">Ne veniam oblique propriae vim, dicant. </p>
                </li>
                <li>
                  <p class=\"mb-0 text-muted mb-2\">Sed everti utroque, vis ea oblique pertinax con. </p>
                </li>
              </ul><img class=\"mb-3\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/signature.png"), "html", null, true);
        echo "\" alt=\"...\" width=\"90\">
              <h6 class=\"text-uppercase mb-0\">Dr. Lyndsey McMillon-Brown</h6>
              <p class=\"text-serif text-primary text-small mb-0\">Principal Investigator</p>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Sermons posts -->
    <section class=\"py-5\" id=\"sermons\">
      <div class=\"container py-5\">
        <header class=\"mb-4 text-center mb-5\">
          <p class=\"text-serif mb-0 text-primary\">Watch our missons online</p>
          <h2 class=\"text-uppercase\">Our latest missions</h2>
        </header>
        <div class=\"row gy-5\">
          <div class=\"col-lg-4\"><a class=\"primary-overlay d-block mb-3\" href=\"text.html\">
              <div class=\"overlay-content\"><img class=\"img-fluid w-100\" src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/Jupiter.jpg"), "html", null, true);
        echo "\" alt=\"...\"></div></a>
            <h4 class=\"mb-0\"> <a class=\"reset-anchor\" href=\"text.html\">Jupiter</a></h4>
            <p class=\"text-serif text-primary text-small\">Spoting Highest-Energy Light Ever Detected From Jupiter</p>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><a class=\"primary-overlay d-block mb-3\" href=\"text.html\">
              <div class=\"overlay-content\"><img class=\"img-fluid w-100\" src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/Cosmic.jpg"), "html", null, true);
        echo "\" alt=\"...\"></div></a>
            <h4 class=\"mb-0\"> <a class=\"reset-anchor\" href=\"text.html\">Cosmic Interaction</a></h4>
            <p class=\"text-serif text-primary text-small\">Hubble Views a Cosmic Interaction</p>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><a class=\"primary-overlay d-block mb-3\" href=\"text.html\">
              <div class=\"overlay-content\"><img class=\"img-fluid w-100\" src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/IXPE.jpg"), "html", null, true);
        echo "\" alt=\"...\"></div></a>
            <h4 class=\"mb-0\"> <a class=\"reset-anchor\" href=\"text.html\">IXPE Sends First Science Image</a></h4>
            <p class=\"text-serif text-primary text-small\">first imaging data since completing its month-long commissioning phase.</p>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
        </div>
      </div>
    </section>
     <!-- Next Event Section-->
    <section class=\"bg-primary-shade text-white py-5\" id=\"events\">
      <div class=\"container text-center\">
        <div class=\"row align-items-center\">
          <div class=\"col-lg-3 text-lg-end mb-4 mb-lg-0\">
            <h2 class=\"mb-0 text-uppercase\">Next Event</h2>
          </div>
          <div class=\"col-lg-6 text-center mb-4 mb-lg-0\">
            <p class=\"text-serif\">Artemis</p>
            <div class=\"p-2 counter event-counter d-flex align-items-center justify-content-center text-center\" data-counter=\".event-counter\" data-date=\"Sat Dec 26 2021 11:12:29 GMT\">
              <div class=\"day counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Days</span>
              </div>
              <div class=\"hour counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Hours</span>
              </div>
              <div class=\"min counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Minutes</span>
              </div>
              <div class=\"sec counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Seconds</span>
              </div>
            </div>
          </div>
          <div class=\"col-lg-3 text-lg-end\"><a class=\"btn btn-outline-light px-4\" href=\"text.html\">Learn more</a></div>
        </div>
      </div>
    </section>
    <!-- Events Section-->
    <section class=\"py-5\">
      <div class=\"container py-5\">
        <header class=\"mb-4 text-center mb-5\">
          <p class=\"text-serif mb-0 text-primary\">Northrop Grumman CRS-17 Mission to the Space Station</p>
          <h2 class=\"text-uppercase\">Next Events</h2>
        </header>
        <div class=\"p-4 p-lg-5 bg-light text-center mb-4\">
          <div class=\"row gy-4 align-items-center\">
            <div class=\"col-lg-3\">
              <div class=\"d-flex align-items-center justify-content-center justify-content-lg-start\">
                <p class=\"text-gray text-xl h1 mb-0\">19</p>
                <div class=\"ms-2\">
                  <h5 class=\"mb-0\">February</h5>
                  <p class=\"text-small mb-0 text-muted\">2022</p>
                </div>
              </div>
            </div>
            <div class=\"col-lg-6 text-center\">
              <h4 class=\"text-primary mb-1\"> <a class=\"reset-anchor\" href=\"text.html\">X-57 First Flight</a></h4>
              <p class=\"text-serif mb-0 text-muted\">February 19, 2022 - 12:40 p.m. Eastern</p>
              <p class=\"text-serif mb-0 text-muted\">Lorem ipsum</p>
            </div>
            <div class=\"col-lg-3 text-lg-end\"><a class=\"btn btn-outline-primary px-4\" href=\"text.html\">Find out more</a></div>
          </div>
        </div>
        <div class=\"p-4 p-lg-5 bg-light text-center\">
          <div class=\"row gy-4 align-items-center\">
            <div class=\"col-lg-3\">
              <div class=\"d-flex align-items-center justify-content-center justify-content-lg-start\">
                <p class=\"text-gray text-xl h1 mb-0\">1</p>
                <div class=\"ms-2\">
                  <h5 class=\"mb-0\">March</h5>
                  <p class=\"text-small mb-0 text-muted\">2022</p>
                </div>
              </div>
            </div>
            <div class=\"col-lg-6 text-center\">
              <h4 class=\"text-primary mb-1\"> <a class=\"reset-anchor\" href=\"text.html\">SGOES-T</a></h4>
              <p class=\"text-serif mb-0 text-muted\">March 1, 2022</p>
              <p class=\"text-serif mb-0 text-muted\">Lorem ipsum</p>
            </div>
            <div class=\"col-lg-3 text-lg-end\"><a class=\"btn btn-outline-primary px-4\" href=\"text.html\">Find out more</a></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section-->
    <section class=\"py-5\" id=\"contact\">
      <div class=\"container py-5\">
        <header class=\"mb-4 mb-5 text-center\">
          <p class=\"text-serif mb-0 text-primary\">Where to find us</p>
          <h2 class=\"text-uppercase\">Reach us</h2>
          <div class=\"row\">
            <div class=\"col-lg-7 mx-auto\">
              <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </header>
        <div class=\"row align-items-stretch gx-0\">
          <div class=\"col-lg-6\">      
            <div class=\"contact-img bg-center bg-cover\" style=\"background: url(Front/img/contact-bg.jpg)\"></div>
          </div>
          <div class=\"col-lg-6\">
            <div class=\"bg-light p-5 h-100\">
              <h4>Celestial</h4>
              <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <ul class=\"list-unstyled mb-0 text-muted\">
                <li class=\"mb-2\"><a class=\"reset-anchor\" href=\"tel:+0035478968\"> <i class=\"text-primary me-3 fas fa-phone\"></i><span>+003 5478 968</span></a></li>
                <li class=\"mb-2\"><a class=\"reset-anchor\" href=\"text.html\"> <i class=\"text-primary me-3 fas fa-globe-americas\"></i><span>402 Park Ave S, NY 10016</span></a></li>
                <li class=\"mb-2\"><a class=\"reset-anchor\" href=\"mailto:church@example.com\"> <i class=\"text-primary me-3 far fa-envelope\"></i><span>Church@example.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "basefront/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 75,  151 => 69,  142 => 63,  122 => 46,  92 => 19,  85 => 15,  78 => 11,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends ('basefront/base.html.twig') %}
{% block body %}
 <!-- Services Section -->
    <section class=\"py-5\" id=\"services\">
      <div class=\"container py-5\">
        <header class=\"mb-4 text-center mb-5\">
          <p class=\"text-serif mb-0 text-primary\">Watch our offers online</p>
          <h2 class=\"text-uppercase\">Our offers        </h2>
        </header>
        <div class=\"row text-center gy-4\">
          <div class=\"col-lg-4\"><img src=\"{{ asset ('Front/img/global.png')}}\" alt=\"...\" width=\"100\">
            <h3 class=\"h5\">Lorem ipsum dolor</h3>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><img src=\"{{ asset ('Front/img/astronaut.png')}}\" alt=\"...\" width=\"100\">
            <h3 class=\"h5\">Lorem ipsum dolor</h3>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><img src=\"{{ asset ('Front/img/travel.png')}}\" alt=\"...\" width=\"100\">
            <h3 class=\"h5\">Special events</h3>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
        </div>
      </div>
    </section>
      <!-- Works Section-->
    <section id=\"works\">
      <div class=\"container-fluid px-0\">
        <div class=\"row align-items-stretch\">
          <div class=\"col-lg-6 half-page-banner bg-cover\" style=\"background: url(Front/img/lyndsey.jpg)\"></div>
          <div class=\"col-lg-6 bg-light py-lg-5\">
            <div class=\"h-100 d-flex flex-column p-5 justify-content-center\">
              <p class=\"text-serif text-primary mb-0\">Where to find us</p>
              <h2 class=\"text-uppercase\">Our work</h2>
              <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
              <ul class=\"list-check ps-0\">
                <li>
                  <p class=\"mb-0 text-muted mb-2\">Eu vim atqui ludus petentium, suas idque est id. </p>
                </li>
                <li>
                  <p class=\"mb-0 text-muted mb-2\">Ne veniam oblique propriae vim, dicant. </p>
                </li>
                <li>
                  <p class=\"mb-0 text-muted mb-2\">Sed everti utroque, vis ea oblique pertinax con. </p>
                </li>
              </ul><img class=\"mb-3\" src=\"{{ asset ('Front/img/signature.png')}}\" alt=\"...\" width=\"90\">
              <h6 class=\"text-uppercase mb-0\">Dr. Lyndsey McMillon-Brown</h6>
              <p class=\"text-serif text-primary text-small mb-0\">Principal Investigator</p>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Sermons posts -->
    <section class=\"py-5\" id=\"sermons\">
      <div class=\"container py-5\">
        <header class=\"mb-4 text-center mb-5\">
          <p class=\"text-serif mb-0 text-primary\">Watch our missons online</p>
          <h2 class=\"text-uppercase\">Our latest missions</h2>
        </header>
        <div class=\"row gy-5\">
          <div class=\"col-lg-4\"><a class=\"primary-overlay d-block mb-3\" href=\"text.html\">
              <div class=\"overlay-content\"><img class=\"img-fluid w-100\" src=\"{{ asset ('Front/img/Jupiter.jpg')}}\" alt=\"...\"></div></a>
            <h4 class=\"mb-0\"> <a class=\"reset-anchor\" href=\"text.html\">Jupiter</a></h4>
            <p class=\"text-serif text-primary text-small\">Spoting Highest-Energy Light Ever Detected From Jupiter</p>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><a class=\"primary-overlay d-block mb-3\" href=\"text.html\">
              <div class=\"overlay-content\"><img class=\"img-fluid w-100\" src=\"{{ asset ('Front/img/Cosmic.jpg')}}\" alt=\"...\"></div></a>
            <h4 class=\"mb-0\"> <a class=\"reset-anchor\" href=\"text.html\">Cosmic Interaction</a></h4>
            <p class=\"text-serif text-primary text-small\">Hubble Views a Cosmic Interaction</p>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
          <div class=\"col-lg-4\"><a class=\"primary-overlay d-block mb-3\" href=\"text.html\">
              <div class=\"overlay-content\"><img class=\"img-fluid w-100\" src=\"{{ asset ('Front/img/IXPE.jpg')}}\" alt=\"...\"></div></a>
            <h4 class=\"mb-0\"> <a class=\"reset-anchor\" href=\"text.html\">IXPE Sends First Science Image</a></h4>
            <p class=\"text-serif text-primary text-small\">first imaging data since completing its month-long commissioning phase.</p>
            <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur elit sed do eiusmod tempor incididunt labore.</p>
          </div>
        </div>
      </div>
    </section>
     <!-- Next Event Section-->
    <section class=\"bg-primary-shade text-white py-5\" id=\"events\">
      <div class=\"container text-center\">
        <div class=\"row align-items-center\">
          <div class=\"col-lg-3 text-lg-end mb-4 mb-lg-0\">
            <h2 class=\"mb-0 text-uppercase\">Next Event</h2>
          </div>
          <div class=\"col-lg-6 text-center mb-4 mb-lg-0\">
            <p class=\"text-serif\">Artemis</p>
            <div class=\"p-2 counter event-counter d-flex align-items-center justify-content-center text-center\" data-counter=\".event-counter\" data-date=\"Sat Dec 26 2021 11:12:29 GMT\">
              <div class=\"day counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Days</span>
              </div>
              <div class=\"hour counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Hours</span>
              </div>
              <div class=\"min counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Minutes</span>
              </div>
              <div class=\"sec counter-item text-center mx-3\">
                <p class=\"h2 num\"></p><span class=\"word text-serif\">Seconds</span>
              </div>
            </div>
          </div>
          <div class=\"col-lg-3 text-lg-end\"><a class=\"btn btn-outline-light px-4\" href=\"text.html\">Learn more</a></div>
        </div>
      </div>
    </section>
    <!-- Events Section-->
    <section class=\"py-5\">
      <div class=\"container py-5\">
        <header class=\"mb-4 text-center mb-5\">
          <p class=\"text-serif mb-0 text-primary\">Northrop Grumman CRS-17 Mission to the Space Station</p>
          <h2 class=\"text-uppercase\">Next Events</h2>
        </header>
        <div class=\"p-4 p-lg-5 bg-light text-center mb-4\">
          <div class=\"row gy-4 align-items-center\">
            <div class=\"col-lg-3\">
              <div class=\"d-flex align-items-center justify-content-center justify-content-lg-start\">
                <p class=\"text-gray text-xl h1 mb-0\">19</p>
                <div class=\"ms-2\">
                  <h5 class=\"mb-0\">February</h5>
                  <p class=\"text-small mb-0 text-muted\">2022</p>
                </div>
              </div>
            </div>
            <div class=\"col-lg-6 text-center\">
              <h4 class=\"text-primary mb-1\"> <a class=\"reset-anchor\" href=\"text.html\">X-57 First Flight</a></h4>
              <p class=\"text-serif mb-0 text-muted\">February 19, 2022 - 12:40 p.m. Eastern</p>
              <p class=\"text-serif mb-0 text-muted\">Lorem ipsum</p>
            </div>
            <div class=\"col-lg-3 text-lg-end\"><a class=\"btn btn-outline-primary px-4\" href=\"text.html\">Find out more</a></div>
          </div>
        </div>
        <div class=\"p-4 p-lg-5 bg-light text-center\">
          <div class=\"row gy-4 align-items-center\">
            <div class=\"col-lg-3\">
              <div class=\"d-flex align-items-center justify-content-center justify-content-lg-start\">
                <p class=\"text-gray text-xl h1 mb-0\">1</p>
                <div class=\"ms-2\">
                  <h5 class=\"mb-0\">March</h5>
                  <p class=\"text-small mb-0 text-muted\">2022</p>
                </div>
              </div>
            </div>
            <div class=\"col-lg-6 text-center\">
              <h4 class=\"text-primary mb-1\"> <a class=\"reset-anchor\" href=\"text.html\">SGOES-T</a></h4>
              <p class=\"text-serif mb-0 text-muted\">March 1, 2022</p>
              <p class=\"text-serif mb-0 text-muted\">Lorem ipsum</p>
            </div>
            <div class=\"col-lg-3 text-lg-end\"><a class=\"btn btn-outline-primary px-4\" href=\"text.html\">Find out more</a></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section-->
    <section class=\"py-5\" id=\"contact\">
      <div class=\"container py-5\">
        <header class=\"mb-4 mb-5 text-center\">
          <p class=\"text-serif mb-0 text-primary\">Where to find us</p>
          <h2 class=\"text-uppercase\">Reach us</h2>
          <div class=\"row\">
            <div class=\"col-lg-7 mx-auto\">
              <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </header>
        <div class=\"row align-items-stretch gx-0\">
          <div class=\"col-lg-6\">      
            <div class=\"contact-img bg-center bg-cover\" style=\"background: url(Front/img/contact-bg.jpg)\"></div>
          </div>
          <div class=\"col-lg-6\">
            <div class=\"bg-light p-5 h-100\">
              <h4>Celestial</h4>
              <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <ul class=\"list-unstyled mb-0 text-muted\">
                <li class=\"mb-2\"><a class=\"reset-anchor\" href=\"tel:+0035478968\"> <i class=\"text-primary me-3 fas fa-phone\"></i><span>+003 5478 968</span></a></li>
                <li class=\"mb-2\"><a class=\"reset-anchor\" href=\"text.html\"> <i class=\"text-primary me-3 fas fa-globe-americas\"></i><span>402 Park Ave S, NY 10016</span></a></li>
                <li class=\"mb-2\"><a class=\"reset-anchor\" href=\"mailto:church@example.com\"> <i class=\"text-primary me-3 far fa-envelope\"></i><span>Church@example.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    {% endblock %}
", "basefront/home.html.twig", "C:\\Users\\zeineb\\Documents\\GitHub\\d2\\Decipher\\templates\\basefront\\home.html.twig");
    }
}
