<?php

/* traits.twig */
class __TwigTemplate_a3aead07e7a3772eebff058152b999acd9f6e972fb0bb2b3f8269b3431551928 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "traits.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_content' => array($this, 'block_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_5b54e1e9b52d944e1904aa2a97605fcd5d9541791ee32fefe6dc629cc630c669"] = $this->loadTemplate("macros.twig", "traits.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Traits | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "traits";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"page-header\">
        <h1>Traits</h1>
    </div>

    <div class=\"container-fluid underlined\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 13
            echo "            ";
            if ($this->getAttribute($context["class"], "trait", array())) {
                // line 14
                echo "                <div class=\"row\">
                    <div class=\"col-md-6\">
                        ";
                // line 16
                echo $context["__internal_5b54e1e9b52d944e1904aa2a97605fcd5d9541791ee32fefe6dc629cc630c669"]->getclass_link($context["class"], true);
                echo "
                    </div>
                    <div class=\"col-md-6\">
                        ";
                // line 19
                echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["class"], "shortdesc", array()), $context["class"]);
                echo "
                    </div>
                </div>
            ";
            }
            // line 23
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "traits.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 24,  80 => 23,  73 => 19,  67 => 16,  63 => 14,  60 => 13,  56 => 12,  49 => 7,  46 => 6,  40 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
    }
}
/* {% extends "layout/layout.twig" %}*/
/* {% from "macros.twig" import class_link %}*/
/* {% block title %}Traits | {{ parent() }}{% endblock %}*/
/* {% block body_class 'traits' %}*/
/* */
/* {% block page_content %}*/
/*     <div class="page-header">*/
/*         <h1>Traits</h1>*/
/*     </div>*/
/* */
/*     <div class="container-fluid underlined">*/
/*         {% for class in classes %}*/
/*             {% if class.trait %}*/
/*                 <div class="row">*/
/*                     <div class="col-md-6">*/
/*                         {{ class_link(class, true) }}*/
/*                     </div>*/
/*                     <div class="col-md-6">*/
/*                         {{ class.shortdesc|desc(class) }}*/
/*                     </div>*/
/*                 </div>*/
/*             {% endif %}*/
/*         {% endfor %}*/
/*     </div>*/
/* {% endblock %}*/
/* */
