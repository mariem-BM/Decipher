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

/* basefront/account.html.twig */
class __TwigTemplate_f6f593a3b0ed96d382e4b613be5ec378b84e43935572a5c287539302e3378326 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/account.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/account.html.twig"));

        $this->parent = $this->loadTemplate("basefront/base.html.twig", "basefront/account.html.twig", 1);
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
        echo "<div class=\"container rounded bg-white mt-5 mb-5\">
    <div class=\"row\">
        <div class=\"col-md-3 border-right\">
            <div class=\"d-flex flex-column align-items-center text-center p-3 py-5\"><img class=\"rounded-circle mt-5\" width=\"150px\" src=\"https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg\"><span class=\"font-weight-bold\">Edogaru</span><span class=\"text-black-50\">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class=\"col-md-5 border-right\">
            <div class=\"p-3 py-5\">
                <div class=\"d-flex justify-content-between align-items-center mb-3\">
                    <h4 class=\"text-right\">Profile Settings</h4>
                </div>
                <div class=\"row mt-2\">
                    <div class=\"col-md-6\"><label class=\"labels\">Name</label><input type=\"text\" class=\"form-control\" placeholder=\"first name\" value=\"\"></div>
                    <div class=\"col-md-6\"><label class=\"labels\">Surname</label><input type=\"text\" class=\"form-control\" value=\"\" placeholder=\"surname\"></div>
                </div>
                <div class=\"row mt-3\">
                    <div class=\"col-md-12\"><label class=\"labels\">Mobile Number</label><input type=\"text\" class=\"form-control\" placeholder=\"enter phone number\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Address Line 1</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 1\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Address Line 2</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Postcode</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">State</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Area</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Email ID</label><input type=\"text\" class=\"form-control\" placeholder=\"enter email id\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Education</label><input type=\"text\" class=\"form-control\" placeholder=\"education\" value=\"\"></div>
                </div>
                <div class=\"row mt-3\">
                    <div class=\"col-md-6\"><label class=\"labels\">Country</label><input type=\"text\" class=\"form-control\" placeholder=\"country\" value=\"\"></div>
                    <div class=\"col-md-6\"><label class=\"labels\">State/Region</label><input type=\"text\" class=\"form-control\" value=\"\" placeholder=\"state\"></div>
                </div>
                <div class=\"mt-5 text-center\"><button class=\"btn btn-primary profile-button\" type=\"button\">Save Profile</button></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"p-3 py-5\">
                <div class=\"d-flex justify-content-between align-items-center experience\"><span>Edit Experience</span><span class=\"border px-3 p-1 add-experience\"><i class=\"fa fa-plus\"></i>&nbsp;Experience</span></div><br>
                <div class=\"col-md-12\"><label class=\"labels\">Experience in Designing</label><input type=\"text\" class=\"form-control\" placeholder=\"experience\" value=\"\"></div> <br>
                <div class=\"col-md-12\"><label class=\"labels\">Additional Details</label><input type=\"text\" class=\"form-control\" placeholder=\"additional details\" value=\"\"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
     ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "basefront/account.html.twig";
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
<div class=\"container rounded bg-white mt-5 mb-5\">
    <div class=\"row\">
        <div class=\"col-md-3 border-right\">
            <div class=\"d-flex flex-column align-items-center text-center p-3 py-5\"><img class=\"rounded-circle mt-5\" width=\"150px\" src=\"https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg\"><span class=\"font-weight-bold\">Edogaru</span><span class=\"text-black-50\">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class=\"col-md-5 border-right\">
            <div class=\"p-3 py-5\">
                <div class=\"d-flex justify-content-between align-items-center mb-3\">
                    <h4 class=\"text-right\">Profile Settings</h4>
                </div>
                <div class=\"row mt-2\">
                    <div class=\"col-md-6\"><label class=\"labels\">Name</label><input type=\"text\" class=\"form-control\" placeholder=\"first name\" value=\"\"></div>
                    <div class=\"col-md-6\"><label class=\"labels\">Surname</label><input type=\"text\" class=\"form-control\" value=\"\" placeholder=\"surname\"></div>
                </div>
                <div class=\"row mt-3\">
                    <div class=\"col-md-12\"><label class=\"labels\">Mobile Number</label><input type=\"text\" class=\"form-control\" placeholder=\"enter phone number\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Address Line 1</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 1\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Address Line 2</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Postcode</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">State</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Area</label><input type=\"text\" class=\"form-control\" placeholder=\"enter address line 2\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Email ID</label><input type=\"text\" class=\"form-control\" placeholder=\"enter email id\" value=\"\"></div>
                    <div class=\"col-md-12\"><label class=\"labels\">Education</label><input type=\"text\" class=\"form-control\" placeholder=\"education\" value=\"\"></div>
                </div>
                <div class=\"row mt-3\">
                    <div class=\"col-md-6\"><label class=\"labels\">Country</label><input type=\"text\" class=\"form-control\" placeholder=\"country\" value=\"\"></div>
                    <div class=\"col-md-6\"><label class=\"labels\">State/Region</label><input type=\"text\" class=\"form-control\" value=\"\" placeholder=\"state\"></div>
                </div>
                <div class=\"mt-5 text-center\"><button class=\"btn btn-primary profile-button\" type=\"button\">Save Profile</button></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"p-3 py-5\">
                <div class=\"d-flex justify-content-between align-items-center experience\"><span>Edit Experience</span><span class=\"border px-3 p-1 add-experience\"><i class=\"fa fa-plus\"></i>&nbsp;Experience</span></div><br>
                <div class=\"col-md-12\"><label class=\"labels\">Experience in Designing</label><input type=\"text\" class=\"form-control\" placeholder=\"experience\" value=\"\"></div> <br>
                <div class=\"col-md-12\"><label class=\"labels\">Additional Details</label><input type=\"text\" class=\"form-control\" placeholder=\"additional details\" value=\"\"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
     {% endblock %}", "basefront/account.html.twig", "C:\\Users\\zeineb\\Documents\\GitHub\\d2\\Decipher\\templates\\basefront\\account.html.twig");
    }
}
