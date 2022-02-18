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

/* post/Post.html.twig */
class __TwigTemplate_722c18cd3f6177ea302185ff7a6883c0c8697829eb10c11c2c280fc453649430 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/Post.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/Post.html.twig"));

        // line 1
        echo "<html>

    <h1>Articles</h1>

  <table>
  <thead>
    <tr>
      <th>id</th>
      <th>Categorie_post_id</th>
      <th>nom_post</th>
      <th>img_post</th>
       <th>description_post</th>
    </tr>
  </thead>
  <tbody>
  
    <tr ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["Articles"]) || array_key_exists("Articles", $context) ? $context["Articles"] : (function () { throw new RuntimeError('Variable "Articles" does not exist.', 17, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            echo ">
        <th>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 18), "html", null, true);
            echo "</th>
      <th>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getCategoriePost", [], "method", false, false, false, 19), "html", null, true);
            echo "</th>
      <th>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getNomPost", [], "method", false, false, false, 20), "html", null, true);
            echo "</th>
      <th>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getImgPost", [], "method", false, false, false, 21), "html", null, true);
            echo "</th> 
       <th>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getDescriptionPost", [], "method", false, false, false, 22), "html", null, true);
            echo "</th>
       
    </tr ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo ">
   
  </tbody>

</table>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "post/Post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 24,  83 => 22,  79 => 21,  75 => 20,  71 => 19,  67 => 18,  61 => 17,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>

    <h1>Articles</h1>

  <table>
  <thead>
    <tr>
      <th>id</th>
      <th>Categorie_post_id</th>
      <th>nom_post</th>
      <th>img_post</th>
       <th>description_post</th>
    </tr>
  </thead>
  <tbody>
  
    <tr {% for article in  Articles %}>
        <th>{{ article.id }}</th>
      <th>{{ article.getCategoriePost() }}</th>
      <th>{{ article.getNomPost() }}</th>
      <th>{{ article.getImgPost()}}</th> 
       <th>{{ article.getDescriptionPost()}}</th>
       
    </tr {% endfor %}>
   
  </tbody>

</table>
</html>", "post/Post.html.twig", "C:\\Users\\zeineb\\Documents\\GitHub\\Decipher\\templates\\post\\Post.html.twig");
    }
}
