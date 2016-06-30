<?php

/* index.twig */
class __TwigTemplate_ba127b407cda791aad4aae070c82d7a7cfb6e610b54daacc69be6c1057d044da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'body_class' => array($this, 'block_body_class'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 7
        return $this->loadTemplate((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), "index.twig", 7);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((isset($context["has_namespaces"]) ? $context["has_namespaces"] : $this->getContext($context, "has_namespaces"))) {
            // line 2
            $context["extension"] = "namespaces.twig";
        } else {
            // line 4
            $context["extension"] = "classes.twig";
        }
        // line 7
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_body_class($context, array $blocks = array())
    {
        echo "index";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 9,  32 => 7,  29 => 4,  26 => 2,  24 => 1,  18 => 7,);
    }
}
/* {% if has_namespaces %}*/
/*     {% set extension = 'namespaces.twig' %}*/
/* {% else %}*/
/*     {% set extension = 'classes.twig' %}*/
/* {% endif %}*/
/* */
/* {% extends extension %}*/
/* */
/* {% block body_class 'index' %}*/
/* */
