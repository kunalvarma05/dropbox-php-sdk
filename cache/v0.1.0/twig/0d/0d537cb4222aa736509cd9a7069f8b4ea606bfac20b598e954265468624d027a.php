<?php

/* layout/base.twig */
class __TwigTemplate_2fb18db237effa53e68c7f3c6d0ca904a8b7fb48165013ce129a36d85b3bd50a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("default/layout/base.twig", "layout/base.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default/layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,700\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "css/flat.css"), "html", null, true);
        echo "\">
";
    }

    public function getTemplateName()
    {
        return "layout/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'default/layout/base.twig' %}*/
/* */
/* {% block head %}*/
/*     {{ parent()  }}*/
/*     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">*/
/*     <link rel="stylesheet" type="text/css" href="{{ path('css/flat.css') }}">*/
/* {% endblock %}*/
