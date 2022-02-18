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

/* basefront/trips.html.twig */
class __TwigTemplate_082efb765b3070d9420beee0e1f5ad4fb72e941ccc0347ca8c02b66f7c8ccae3 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/trips.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/trips.html.twig"));

        $this->parent = $this->loadTemplate("basefront/base.html.twig", "basefront/trips.html.twig", 1);
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
        echo "
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

    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "basefront/trips.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends ('basefront/base.html.twig') %}
{% block body %}

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

    {% endblock %}
", "basefront/trips.html.twig", "C:\\Users\\zeineb\\Documents\\GitHub\\d2\\Decipher\\templates\\basefront\\trips.html.twig");
    }
}
