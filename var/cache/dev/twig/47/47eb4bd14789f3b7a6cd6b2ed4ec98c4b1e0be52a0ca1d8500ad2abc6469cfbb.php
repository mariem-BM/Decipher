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

/* basefront/blog.html.twig */
class __TwigTemplate_086cd3df42fc573644d87b9f0dfaee503eac2ee5ae620877e280c1f7f9fe861a extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/blog.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basefront/blog.html.twig"));

        $this->parent = $this->loadTemplate("basefront/base.html.twig", "basefront/blog.html.twig", 1);
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
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/css/templatemo-xtra-blog.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<div class=\"container\">
        <main class=\"tm-main\">
            <!-- Search form -->
            <div class=\"row tm-row\">
                <div class=\"col-12\">
                    <form method=\"GET\" class=\"form-inline tm-mb-80 tm-search-form\">                
                        <input class=\"form-control tm-search-input\" name=\"query\" type=\"text\" placeholder=\"Search...\" aria-label=\"Search\">
                        <button class=\"tm-search-button\" type=\"submit\">
                            <i class=\"fas fa-search tm-search-icon\" aria-hidden=\"true\"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            
            <div class=\"row tm-row\">
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-60\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/e.jpg"), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid\">                            
                        </div>
                        <span class=\"position-absolute tm-new-badge\">New</span>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Simple and useful HTML layout</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        There is a clickable image with beautiful hover effect and active title link for each post item. 
                        Left side is a sticky menu bar. Right side is a blog content that will scroll up and down.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Travel . Events</span>
                        <span class=\"tm-color-primary\">June 24, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>36 comments</span>
                        <span>by Admin Nat</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-60\">
                        <div class=\" tm-post-link-inner\">
                            <img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/equipement4.jpg"), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid\">                            
                        </div>
                        <span class=\"position-absolute tm-new-badge\">New</span>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Multi-purpose blog template</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        <a rel=\"nofollow\" href=\"https://templatemo.com/tm-553-xtra-blog\" target=\"_blank\">Xtra Blog</a>  is a multi-purpose HTML CSS template from TemplateMo website. 
                        Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Creative . Design . Business</span>
                        <span class=\"tm-color-primary\">June 16, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>48 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/equipement3.jpg"), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">How can you apply Xtra Blog</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        You are <u>allowed</u> to convert this template as any kind of CMS theme or template for your custom website builder. 
                        You can also use this for your clients. Thank you for choosing us.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Music . Audio</span>
                        <span class=\"tm-color-primary\">June 11, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>24 comments</span>
                        <span>by John Walker</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/equipement2.jpg"), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">A little restriction to apply</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        You are <u>not allowed</u> to re-distribute this template as a downloadable ZIP file on any template collection
                        website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Artworks . Design</span>
                        <span class=\"tm-color-primary\">June 4, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>72 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/equipement1.jpg"), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Color hexa values of Xtra Blog</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        If you wish to kindly support us, please contact us or contribute a small PayPal amount to info [at] templatemo.com that is helpful for us.
                        <br>
                        Title #099 New #0CC <br>
                        <span class=\"tm-color-primary\">Text #999 Line #CCC Next #0CC Prev #F0F0F0</span>
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Creative . Video . Audio</span>
                        <span class=\"tm-color-primary\">May 31, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>84 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/img/cosmic.jpg"), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Donec convallis varius risus</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        Quisque id ipsum vel sem maximus vulputate sed quis velit. Nunc vel turpis eget orci elementum cursus vitae in eros. Quisque vulputate nulla ut dolor consectetur luctus.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Visual . Artworks</span>
                        <span class=\"tm-color-primary\">June 16, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>96 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
            </div>
            <div class=\"row tm-row tm-mt-100 tm-mb-75\">
                <div class=\"tm-prev-next-wrapper\">
                    <a href=\"#\" class=\"mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20\">Prev</a>
                    <a href=\"#\" class=\"mb-2 tm-btn tm-btn-primary tm-prev-next\">Next</a>
                </div>
                <div class=\"tm-paging-wrapper\">
                    <span class=\"d-inline-block mr-3\">Page</span>
                    <nav class=\"tm-paging-nav d-inline-block\">
                        <ul>
                            <li class=\"tm-paging-item active\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">1</a>
                            </li>
                            <li class=\"tm-paging-item\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">2</a>
                            </li>
                            <li class=\"tm-paging-item\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">3</a>
                            </li>
                            <li class=\"tm-paging-item\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">4</a>
                            </li>
                        </ul>
                    </nav>
                </div>                
            </div> 
             <script src=\"";
        // line 179
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 180
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/js/templatemo-script.js"), "html", null, true);
        echo "\"></script>
     ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "basefront/blog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 180,  266 => 179,  220 => 136,  193 => 112,  168 => 90,  143 => 68,  117 => 45,  91 => 22,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends ('basefront/base.html.twig') %}
{% block body %}
<link href=\"{{ asset ('Front/css/templatemo-xtra-blog.css')}}\" rel=\"stylesheet\">
<div class=\"container\">
        <main class=\"tm-main\">
            <!-- Search form -->
            <div class=\"row tm-row\">
                <div class=\"col-12\">
                    <form method=\"GET\" class=\"form-inline tm-mb-80 tm-search-form\">                
                        <input class=\"form-control tm-search-input\" name=\"query\" type=\"text\" placeholder=\"Search...\" aria-label=\"Search\">
                        <button class=\"tm-search-button\" type=\"submit\">
                            <i class=\"fas fa-search tm-search-icon\" aria-hidden=\"true\"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            
            <div class=\"row tm-row\">
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-60\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"{{ asset ('Front/img/e.jpg')}}\" alt=\"Image\" class=\"img-fluid\">                            
                        </div>
                        <span class=\"position-absolute tm-new-badge\">New</span>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Simple and useful HTML layout</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        There is a clickable image with beautiful hover effect and active title link for each post item. 
                        Left side is a sticky menu bar. Right side is a blog content that will scroll up and down.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Travel . Events</span>
                        <span class=\"tm-color-primary\">June 24, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>36 comments</span>
                        <span>by Admin Nat</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-60\">
                        <div class=\" tm-post-link-inner\">
                            <img src=\"{{ asset ('Front/img/equipement4.jpg')}}\" alt=\"Image\" class=\"img-fluid\">                            
                        </div>
                        <span class=\"position-absolute tm-new-badge\">New</span>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Multi-purpose blog template</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        <a rel=\"nofollow\" href=\"https://templatemo.com/tm-553-xtra-blog\" target=\"_blank\">Xtra Blog</a>  is a multi-purpose HTML CSS template from TemplateMo website. 
                        Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Creative . Design . Business</span>
                        <span class=\"tm-color-primary\">June 16, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>48 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"{{ asset ('Front/img/equipement3.jpg')}}\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">How can you apply Xtra Blog</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        You are <u>allowed</u> to convert this template as any kind of CMS theme or template for your custom website builder. 
                        You can also use this for your clients. Thank you for choosing us.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Music . Audio</span>
                        <span class=\"tm-color-primary\">June 11, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>24 comments</span>
                        <span>by John Walker</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"{{ asset ('Front/img/equipement2.jpg')}}\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">A little restriction to apply</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        You are <u>not allowed</u> to re-distribute this template as a downloadable ZIP file on any template collection
                        website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Artworks . Design</span>
                        <span class=\"tm-color-primary\">June 4, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>72 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"{{ asset ('Front/img/equipement1.jpg')}}\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Color hexa values of Xtra Blog</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        If you wish to kindly support us, please contact us or contribute a small PayPal amount to info [at] templatemo.com that is helpful for us.
                        <br>
                        Title #099 New #0CC <br>
                        <span class=\"tm-color-primary\">Text #999 Line #CCC Next #0CC Prev #F0F0F0</span>
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Creative . Video . Audio</span>
                        <span class=\"tm-color-primary\">May 31, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>84 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class=\"col-12 col-md-6 tm-post\">
                    <hr class=\"tm-hr-primary\">
                    <a href=\"post.html\" class=\"effect-lily tm-post-link tm-pt-20\">
                        <div class=\"tm-post-link-inner\">
                            <img src=\"{{ asset ('Front/img/cosmic.jpg')}}\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <h2 class=\"tm-pt-30 tm-color-primary tm-post-title\">Donec convallis varius risus</h2>
                    </a>                    
                    <p class=\"tm-pt-30\">
                        Quisque id ipsum vel sem maximus vulputate sed quis velit. Nunc vel turpis eget orci elementum cursus vitae in eros. Quisque vulputate nulla ut dolor consectetur luctus.
                    </p>
                    <div class=\"d-flex justify-content-between tm-pt-45\">
                        <span class=\"tm-color-primary\">Visual . Artworks</span>
                        <span class=\"tm-color-primary\">June 16, 2020</span>
                    </div>
                    <hr>
                    <div class=\"d-flex justify-content-between\">
                        <span>96 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
            </div>
            <div class=\"row tm-row tm-mt-100 tm-mb-75\">
                <div class=\"tm-prev-next-wrapper\">
                    <a href=\"#\" class=\"mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20\">Prev</a>
                    <a href=\"#\" class=\"mb-2 tm-btn tm-btn-primary tm-prev-next\">Next</a>
                </div>
                <div class=\"tm-paging-wrapper\">
                    <span class=\"d-inline-block mr-3\">Page</span>
                    <nav class=\"tm-paging-nav d-inline-block\">
                        <ul>
                            <li class=\"tm-paging-item active\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">1</a>
                            </li>
                            <li class=\"tm-paging-item\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">2</a>
                            </li>
                            <li class=\"tm-paging-item\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">3</a>
                            </li>
                            <li class=\"tm-paging-item\">
                                <a href=\"#\" class=\"mb-2 tm-btn tm-paging-link\">4</a>
                            </li>
                        </ul>
                    </nav>
                </div>                
            </div> 
             <script src=\"{{ asset ('Front/js/jquery.min.js')}}\"></script>
    <script src=\"{{ asset ('Front/js/templatemo-script.js')}}\"></script>
     {% endblock %}           ", "basefront/blog.html.twig", "C:\\Users\\zeineb\\Documents\\GitHub\\d2\\Decipher\\templates\\basefront\\blog.html.twig");
    }
}
