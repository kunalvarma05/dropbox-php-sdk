<?php

/* class.twig */
class __TwigTemplate_835bf3690adcef3390492902564939421f17f40879d2cffeca80b0254a575803 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "class.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_id' => array($this, 'block_page_id'),
            'below_menu' => array($this, 'block_below_menu'),
            'page_content' => array($this, 'block_page_content'),
            'class_signature' => array($this, 'block_class_signature'),
            'method_signature' => array($this, 'block_method_signature'),
            'method_parameters_signature' => array($this, 'block_method_parameters_signature'),
            'parameters' => array($this, 'block_parameters'),
            'return' => array($this, 'block_return'),
            'exceptions' => array($this, 'block_exceptions'),
            'see' => array($this, 'block_see'),
            'constants' => array($this, 'block_constants'),
            'properties' => array($this, 'block_properties'),
            'methods' => array($this, 'block_methods'),
            'methods_details' => array($this, 'block_methods_details'),
            'method' => array($this, 'block_method'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"] = $this->loadTemplate("macros.twig", "class.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class"));
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "class";
    }

    // line 5
    public function block_page_id($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("class:" . twig_replace_filter($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "name", array()), array("\\" => "_"))), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "namespace", array())) {
            // line 9
            echo "        <div class=\"namespace-breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><span class=\"label label-default\">";
            // line 11
            echo $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "categoryName", array());
            echo "</span></li>
                ";
            // line 12
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getbreadcrumbs($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "namespace", array()));
            echo "
                <li>";
            // line 13
            echo $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "shortname", array());
            echo "</li>
            </ol>
        </div>
    ";
        }
    }

    // line 19
    public function block_page_content($context, array $blocks = array())
    {
        // line 20
        echo "
    <div class=\"page-header\">
        <h1>
            ";
        // line 23
        echo twig_last($this->env, twig_split_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "name", array()), "\\"));
        echo "
            ";
        // line 24
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getdeprecated((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
        echo "
        </h1>
    </div>

    <p>";
        // line 28
        $this->displayBlock("class_signature", $context, $blocks);
        echo "</p>

    ";
        // line 30
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getdeprecations((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
        echo "

    ";
        // line 32
        if (($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "shortdesc", array()) || $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "longdesc", array()))) {
            // line 33
            echo "        <div class=\"description\">
            ";
            // line 34
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "shortdesc", array())) {
                // line 35
                echo "<p>";
                echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                echo "</p>";
            }
            // line 37
            echo "            ";
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "longdesc", array())) {
                // line 38
                echo "<p>";
                echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "longdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                echo "</p>";
            }
            // line 40
            echo "        </div>
    ";
        }
        // line 42
        echo "
    ";
        // line 43
        if ((isset($context["traits"]) ? $context["traits"] : $this->getContext($context, "traits"))) {
            // line 44
            echo "        <h2>Traits</h2>

        ";
            // line 46
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getrender_classes((isset($context["traits"]) ? $context["traits"] : $this->getContext($context, "traits")));
            echo "
    ";
        }
        // line 48
        echo "
    ";
        // line 49
        if ((isset($context["constants"]) ? $context["constants"] : $this->getContext($context, "constants"))) {
            // line 50
            echo "        <h2>Constants</h2>

        ";
            // line 52
            $this->displayBlock("constants", $context, $blocks);
            echo "
    ";
        }
        // line 54
        echo "
    ";
        // line 55
        if ((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))) {
            // line 56
            echo "        <h2>Properties</h2>

        ";
            // line 58
            $this->displayBlock("properties", $context, $blocks);
            echo "
    ";
        }
        // line 60
        echo "
    ";
        // line 61
        if ((isset($context["methods"]) ? $context["methods"] : $this->getContext($context, "methods"))) {
            // line 62
            echo "        <h2>Methods</h2>

        ";
            // line 64
            $this->displayBlock("methods", $context, $blocks);
            echo "

        <h2>Details</h2>

        ";
            // line 68
            $this->displayBlock("methods_details", $context, $blocks);
            echo "
    ";
        }
        // line 70
        echo "
";
    }

    // line 73
    public function block_class_signature($context, array $blocks = array())
    {
        // line 74
        if (( !$this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "interface", array()) && $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "abstract", array()))) {
            echo "abstract ";
        }
        // line 75
        echo "    ";
        echo $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "categoryName", array());
        echo "
    <strong>";
        // line 76
        echo $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "shortname", array());
        echo "</strong>";
        // line 77
        if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "parent", array())) {
            // line 78
            echo "        extends ";
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getclass_link($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "parent", array()));
        }
        // line 80
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "interfaces", array())) > 0)) {
            // line 81
            echo "        implements
        ";
            // line 82
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "interfaces", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["interface"]) {
                // line 83
                echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getclass_link($context["interface"]);
                // line 84
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo ", ";
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['interface'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 87
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getsource_link((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
        echo "
";
    }

    // line 90
    public function block_method_signature($context, array $blocks = array())
    {
        // line 91
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "final", array())) {
            echo "final";
        }
        // line 92
        echo "    ";
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "abstract", array())) {
            echo "abstract";
        }
        // line 93
        echo "    ";
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "static", array())) {
            echo "static";
        }
        // line 94
        echo "    ";
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "protected", array())) {
            echo "protected";
        }
        // line 95
        echo "    ";
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "private", array())) {
            echo "private";
        }
        // line 96
        echo "    ";
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->gethint_link($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "hint", array()));
        echo "
    <strong>";
        // line 97
        echo $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "name", array());
        echo "</strong>";
        $this->displayBlock("method_parameters_signature", $context, $blocks);
    }

    // line 100
    public function block_method_parameters_signature($context, array $blocks = array())
    {
        // line 101
        $context["__internal_1b629eed46caf17a50a6ea6a394a541b6b27e3f2d2f165cee9169865d0df1eca"] = $this->loadTemplate("macros.twig", "class.twig", 101);
        // line 102
        echo $context["__internal_1b629eed46caf17a50a6ea6a394a541b6b27e3f2d2f165cee9169865d0df1eca"]->getmethod_parameters_signature((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")));
        echo "
    ";
        // line 103
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getdeprecated((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")));
    }

    // line 106
    public function block_parameters($context, array $blocks = array())
    {
        // line 107
        echo "    <table class=\"table table-condensed\">
        ";
        // line 108
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "parameters", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
            // line 109
            echo "            <tr>
                <td>";
            // line 110
            if ($this->getAttribute($context["parameter"], "hint", array())) {
                echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->gethint_link($this->getAttribute($context["parameter"], "hint", array()));
            }
            echo "</td>
                <td>\$";
            // line 111
            echo $this->getAttribute($context["parameter"], "name", array());
            echo "</td>
                <td>";
            // line 112
            echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["parameter"], "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "    </table>
";
    }

    // line 118
    public function block_return($context, array $blocks = array())
    {
        // line 119
        echo "    <table class=\"table table-condensed\">
        <tr>
            <td>";
        // line 121
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->gethint_link($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "hint", array()));
        echo "</td>
            <td>";
        // line 122
        echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "hintDesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
        echo "</td>
        </tr>
    </table>
";
    }

    // line 127
    public function block_exceptions($context, array $blocks = array())
    {
        // line 128
        echo "    <table class=\"table table-condensed\">
        ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "exceptions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["exception"]) {
            // line 130
            echo "            <tr>
                <td>";
            // line 131
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getclass_link($this->getAttribute($context["exception"], 0, array(), "array"));
            echo "</td>
                <td>";
            // line 132
            echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["exception"], 1, array(), "array"), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exception'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "    </table>
";
    }

    // line 138
    public function block_see($context, array $blocks = array())
    {
        // line 139
        echo "    <table class=\"table table-condensed\">
        ";
        // line 140
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "tags", array(0 => "see"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 141
            echo "            <tr>
                <td>";
            // line 142
            echo $this->getAttribute($context["tag"], 0, array(), "array");
            echo "</td>
                <td>";
            // line 143
            echo twig_join_filter(twig_slice($this->env, $context["tag"], 1, null), " ");
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        echo "    </table>
";
    }

    // line 149
    public function block_constants($context, array $blocks = array())
    {
        // line 150
        echo "    <table class=\"table table-condensed\">
        ";
        // line 151
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["constants"]) ? $context["constants"] : $this->getContext($context, "constants")));
        foreach ($context['_seq'] as $context["_key"] => $context["constant"]) {
            // line 152
            echo "            <tr>
                <td>";
            // line 153
            echo $this->getAttribute($context["constant"], "name", array());
            echo "</td>
                <td class=\"last\">
                    <p><em>";
            // line 155
            echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["constant"], "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
            echo "</em></p>
                    <p>";
            // line 156
            echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["constant"], "longdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
            echo "</p>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['constant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "    </table>
";
    }

    // line 163
    public function block_properties($context, array $blocks = array())
    {
        // line 164
        echo "    <table class=\"table table-condensed\">
        ";
        // line 165
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")));
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 166
            echo "            <tr>
                <td class=\"type\" id=\"property_";
            // line 167
            echo $this->getAttribute($context["property"], "name", array());
            echo "\">
                    ";
            // line 168
            if ($this->getAttribute($context["property"], "static", array())) {
                echo "static";
            }
            // line 169
            echo "                    ";
            if ($this->getAttribute($context["property"], "protected", array())) {
                echo "protected";
            }
            // line 170
            echo "                    ";
            if ($this->getAttribute($context["property"], "private", array())) {
                echo "private";
            }
            // line 171
            echo "                    ";
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->gethint_link($this->getAttribute($context["property"], "hint", array()));
            echo "
                </td>
                <td>\$";
            // line 173
            echo $this->getAttribute($context["property"], "name", array());
            echo "</td>
                <td class=\"last\">";
            // line 174
            echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["property"], "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
            echo "</td>
                <td>";
            // line 176
            if ( !($this->getAttribute($context["property"], "class", array()) === (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")))) {
                // line 177
                echo "<small>from&nbsp;";
                echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getproperty_link($context["property"], false, true);
                echo "</small>";
            }
            // line 179
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 182
        echo "    </table>
";
    }

    // line 185
    public function block_methods($context, array $blocks = array())
    {
        // line 186
        echo "    <div class=\"container-fluid underlined\">
        ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : $this->getContext($context, "methods")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 188
            echo "            <div class=\"row\">
                <div class=\"col-md-2 type\">
                    ";
            // line 190
            if ($this->getAttribute($context["method"], "static", array())) {
                echo "static&nbsp;";
            }
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->gethint_link($this->getAttribute($context["method"], "hint", array()));
            echo "
                </div>
                <div class=\"col-md-8 type\">
                    <a href=\"#method_";
            // line 193
            echo $this->getAttribute($context["method"], "name", array());
            echo "\">";
            echo $this->getAttribute($context["method"], "name", array());
            echo "</a>";
            $this->displayBlock("method_parameters_signature", $context, $blocks);
            echo "
                    ";
            // line 194
            if ( !$this->getAttribute($context["method"], "shortdesc", array())) {
                // line 195
                echo "                        <p class=\"no-description\">No description</p>
                    ";
            } else {
                // line 197
                echo "                        <p>";
                echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["method"], "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                echo "</p>";
            }
            // line 199
            echo "                </div>
                <div class=\"col-md-2\">";
            // line 201
            if ( !($this->getAttribute($context["method"], "class", array()) === (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")))) {
                // line 202
                echo "<small>from&nbsp;";
                echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getmethod_link($context["method"], false, true);
                echo "</small>";
            }
            // line 204
            echo "</div>
            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 207
        echo "    </div>
";
    }

    // line 210
    public function block_methods_details($context, array $blocks = array())
    {
        // line 211
        echo "    <div id=\"method-details\">
        ";
        // line 212
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : $this->getContext($context, "methods")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 213
            echo "            <div class=\"method-item\">
                ";
            // line 214
            $this->displayBlock("method", $context, $blocks);
            echo "
            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 217
        echo "    </div>
";
    }

    // line 220
    public function block_method($context, array $blocks = array())
    {
        // line 221
        echo "    <h3 id=\"method_";
        echo $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "name", array());
        echo "\">
        <div class=\"location\">";
        // line 222
        if ( !($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "class", array()) === (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")))) {
            echo "in ";
            echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getmethod_link((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), false, true);
            echo " ";
        }
        echo "at line ";
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getmethod_source_link((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")));
        echo "</div>
        <code>";
        // line 223
        $this->displayBlock("method_signature", $context, $blocks);
        echo "</code>
    </h3>
    <div class=\"details\">
        ";
        // line 226
        echo $context["__internal_a840f4837fa2da108616378777117bf5f6815973fd874c97caae7563ba8e12d9"]->getdeprecations((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")));
        echo "

        ";
        // line 228
        if (($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "shortdesc", array()) || $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "longdesc", array()))) {
            // line 229
            echo "            <div class=\"method-description\">
                ";
            // line 230
            if (( !$this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "shortdesc", array()) &&  !$this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "longdesc", array()))) {
                // line 231
                echo "                    <p class=\"no-description\">No description</p>
                ";
            } else {
                // line 233
                echo "                    ";
                if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "shortdesc", array())) {
                    // line 234
                    echo "<p>";
                    echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                    echo "</p>";
                }
                // line 236
                echo "                    ";
                if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "longdesc", array())) {
                    // line 237
                    echo "<p>";
                    echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "longdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                    echo "</p>";
                }
            }
            // line 240
            echo "            </div>
        ";
        }
        // line 242
        echo "        <div class=\"tags\">
            ";
        // line 243
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "parameters", array())) {
            // line 244
            echo "                <h4>Parameters</h4>

                ";
            // line 246
            $this->displayBlock("parameters", $context, $blocks);
            echo "
            ";
        }
        // line 248
        echo "
            ";
        // line 249
        if (($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "hintDesc", array()) || $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "hint", array()))) {
            // line 250
            echo "                <h4>Return Value</h4>

                ";
            // line 252
            $this->displayBlock("return", $context, $blocks);
            echo "
            ";
        }
        // line 254
        echo "
            ";
        // line 255
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "exceptions", array())) {
            // line 256
            echo "                <h4>Exceptions</h4>

                ";
            // line 258
            $this->displayBlock("exceptions", $context, $blocks);
            echo "
            ";
        }
        // line 260
        echo "
            ";
        // line 261
        if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "tags", array(0 => "see"), "method")) {
            // line 262
            echo "                <h4>See also</h4>

                ";
            // line 264
            $this->displayBlock("see", $context, $blocks);
            echo "
            ";
        }
        // line 266
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "class.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  805 => 266,  800 => 264,  796 => 262,  794 => 261,  791 => 260,  786 => 258,  782 => 256,  780 => 255,  777 => 254,  772 => 252,  768 => 250,  766 => 249,  763 => 248,  758 => 246,  754 => 244,  752 => 243,  749 => 242,  745 => 240,  739 => 237,  736 => 236,  731 => 234,  728 => 233,  724 => 231,  722 => 230,  719 => 229,  717 => 228,  712 => 226,  706 => 223,  696 => 222,  691 => 221,  688 => 220,  683 => 217,  666 => 214,  663 => 213,  646 => 212,  643 => 211,  640 => 210,  635 => 207,  619 => 204,  614 => 202,  612 => 201,  609 => 199,  604 => 197,  600 => 195,  598 => 194,  590 => 193,  581 => 190,  577 => 188,  560 => 187,  557 => 186,  554 => 185,  549 => 182,  541 => 179,  536 => 177,  534 => 176,  530 => 174,  526 => 173,  520 => 171,  515 => 170,  510 => 169,  506 => 168,  502 => 167,  499 => 166,  495 => 165,  492 => 164,  489 => 163,  484 => 160,  474 => 156,  470 => 155,  465 => 153,  462 => 152,  458 => 151,  455 => 150,  452 => 149,  447 => 146,  438 => 143,  434 => 142,  431 => 141,  427 => 140,  424 => 139,  421 => 138,  416 => 135,  407 => 132,  403 => 131,  400 => 130,  396 => 129,  393 => 128,  390 => 127,  382 => 122,  378 => 121,  374 => 119,  371 => 118,  366 => 115,  357 => 112,  353 => 111,  347 => 110,  344 => 109,  340 => 108,  337 => 107,  334 => 106,  330 => 103,  326 => 102,  324 => 101,  321 => 100,  315 => 97,  310 => 96,  305 => 95,  300 => 94,  295 => 93,  290 => 92,  286 => 91,  283 => 90,  277 => 87,  260 => 84,  258 => 83,  241 => 82,  238 => 81,  236 => 80,  232 => 78,  230 => 77,  227 => 76,  222 => 75,  218 => 74,  215 => 73,  210 => 70,  205 => 68,  198 => 64,  194 => 62,  192 => 61,  189 => 60,  184 => 58,  180 => 56,  178 => 55,  175 => 54,  170 => 52,  166 => 50,  164 => 49,  161 => 48,  156 => 46,  152 => 44,  150 => 43,  147 => 42,  143 => 40,  138 => 38,  135 => 37,  130 => 35,  128 => 34,  125 => 33,  123 => 32,  118 => 30,  113 => 28,  106 => 24,  102 => 23,  97 => 20,  94 => 19,  85 => 13,  81 => 12,  77 => 11,  73 => 9,  70 => 8,  67 => 7,  61 => 5,  55 => 4,  47 => 3,  43 => 1,  41 => 2,  11 => 1,);
    }
}
/* {% extends "layout/layout.twig" %}*/
/* {% from "macros.twig" import render_classes, breadcrumbs, namespace_link, class_link, property_link, method_link, hint_link, source_link, method_source_link, deprecated, deprecations %}*/
/* {% block title %}{{ class|raw }} | {{ parent() }}{% endblock %}*/
/* {% block body_class 'class' %}*/
/* {% block page_id 'class:' ~ (class.name|replace({'\\': '_'})) %}*/
/* */
/* {% block below_menu %}*/
/*     {% if class.namespace %}*/
/*         <div class="namespace-breadcrumbs">*/
/*             <ol class="breadcrumb">*/
/*                 <li><span class="label label-default">{{ class.categoryName|raw }}</span></li>*/
/*                 {{ breadcrumbs(class.namespace) }}*/
/*                 <li>{{ class.shortname|raw }}</li>*/
/*             </ol>*/
/*         </div>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block page_content %}*/
/* */
/*     <div class="page-header">*/
/*         <h1>*/
/*             {{ class.name|split('\\')|last|raw }}*/
/*             {{ deprecated(class) }}*/
/*         </h1>*/
/*     </div>*/
/* */
/*     <p>{{ block('class_signature') }}</p>*/
/* */
/*     {{ deprecations(class) }}*/
/* */
/*     {% if class.shortdesc or class.longdesc %}*/
/*         <div class="description">*/
/*             {% if class.shortdesc -%}*/
/*                 <p>{{ class.shortdesc|desc(class) }}</p>*/
/*             {%- endif %}*/
/*             {% if class.longdesc -%}*/
/*                 <p>{{ class.longdesc|desc(class) }}</p>*/
/*             {%- endif %}*/
/*         </div>*/
/*     {% endif %}*/
/* */
/*     {% if traits %}*/
/*         <h2>Traits</h2>*/
/* */
/*         {{ render_classes(traits) }}*/
/*     {% endif %}*/
/* */
/*     {% if constants %}*/
/*         <h2>Constants</h2>*/
/* */
/*         {{ block('constants') }}*/
/*     {% endif %}*/
/* */
/*     {% if properties %}*/
/*         <h2>Properties</h2>*/
/* */
/*         {{ block('properties') }}*/
/*     {% endif %}*/
/* */
/*     {% if methods %}*/
/*         <h2>Methods</h2>*/
/* */
/*         {{ block('methods') }}*/
/* */
/*         <h2>Details</h2>*/
/* */
/*         {{ block('methods_details') }}*/
/*     {% endif %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block class_signature -%}*/
/*     {% if not class.interface and class.abstract %}abstract {% endif %}*/
/*     {{ class.categoryName|raw }}*/
/*     <strong>{{ class.shortname|raw }}</strong>*/
/*     {%- if class.parent %}*/
/*         extends {{ class_link(class.parent) }}*/
/*     {%- endif %}*/
/*     {%- if class.interfaces|length > 0 %}*/
/*         implements*/
/*         {% for interface in class.interfaces %}*/
/*             {{- class_link(interface) }}*/
/*             {%- if not loop.last %}, {% endif %}*/
/*         {%- endfor %}*/
/*     {%- endif %}*/
/*     {{- source_link(project, class) }}*/
/* {% endblock %}*/
/* */
/* {% block method_signature -%}*/
/*     {% if method.final %}final{% endif %}*/
/*     {% if method.abstract %}abstract{% endif %}*/
/*     {% if method.static %}static{% endif %}*/
/*     {% if method.protected %}protected{% endif %}*/
/*     {% if method.private %}private{% endif %}*/
/*     {{ hint_link(method.hint) }}*/
/*     <strong>{{ method.name|raw }}</strong>{{ block('method_parameters_signature') }}*/
/* {%- endblock %}*/
/* */
/* {% block method_parameters_signature -%}*/
/*     {%- from "macros.twig" import method_parameters_signature -%}*/
/*     {{ method_parameters_signature(method) }}*/
/*     {{ deprecated(method) }}*/
/* {%- endblock %}*/
/* */
/* {% block parameters %}*/
/*     <table class="table table-condensed">*/
/*         {% for parameter in method.parameters %}*/
/*             <tr>*/
/*                 <td>{% if parameter.hint %}{{ hint_link(parameter.hint) }}{% endif %}</td>*/
/*                 <td>${{ parameter.name|raw }}</td>*/
/*                 <td>{{ parameter.shortdesc|desc(class) }}</td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block return %}*/
/*     <table class="table table-condensed">*/
/*         <tr>*/
/*             <td>{{ hint_link(method.hint) }}</td>*/
/*             <td>{{ method.hintDesc|desc(class) }}</td>*/
/*         </tr>*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block exceptions %}*/
/*     <table class="table table-condensed">*/
/*         {% for exception in method.exceptions %}*/
/*             <tr>*/
/*                 <td>{{ class_link(exception[0]) }}</td>*/
/*                 <td>{{ exception[1]|desc(class) }}</td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block see %}*/
/*     <table class="table table-condensed">*/
/*         {% for tag in method.tags('see') %}*/
/*             <tr>*/
/*                 <td>{{ tag[0]|raw }}</td>*/
/*                 <td>{{ tag[1:]|join(' ')|raw }}</td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block constants %}*/
/*     <table class="table table-condensed">*/
/*         {% for constant in constants %}*/
/*             <tr>*/
/*                 <td>{{ constant.name|raw }}</td>*/
/*                 <td class="last">*/
/*                     <p><em>{{ constant.shortdesc|desc(class) }}</em></p>*/
/*                     <p>{{ constant.longdesc|desc(class) }}</p>*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block properties %}*/
/*     <table class="table table-condensed">*/
/*         {% for property in properties %}*/
/*             <tr>*/
/*                 <td class="type" id="property_{{ property.name|raw }}">*/
/*                     {% if property.static %}static{% endif %}*/
/*                     {% if property.protected %}protected{% endif %}*/
/*                     {% if property.private %}private{% endif %}*/
/*                     {{ hint_link(property.hint) }}*/
/*                 </td>*/
/*                 <td>${{ property.name|raw }}</td>*/
/*                 <td class="last">{{ property.shortdesc|desc(class) }}</td>*/
/*                 <td>*/
/*                     {%- if property.class is not same as(class) -%}*/
/*                         <small>from&nbsp;{{ property_link(property, false, true) }}</small>*/
/*                     {%- endif -%}*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block methods %}*/
/*     <div class="container-fluid underlined">*/
/*         {% for method in methods %}*/
/*             <div class="row">*/
/*                 <div class="col-md-2 type">*/
/*                     {% if method.static %}static&nbsp;{% endif %}{{ hint_link(method.hint) }}*/
/*                 </div>*/
/*                 <div class="col-md-8 type">*/
/*                     <a href="#method_{{ method.name|raw }}">{{ method.name|raw }}</a>{{ block('method_parameters_signature') }}*/
/*                     {% if not method.shortdesc %}*/
/*                         <p class="no-description">No description</p>*/
/*                     {% else %}*/
/*                         <p>{{ method.shortdesc|desc(class) }}</p>*/
/*                     {%- endif %}*/
/*                 </div>*/
/*                 <div class="col-md-2">*/
/*                     {%- if method.class is not same as(class) -%}*/
/*                         <small>from&nbsp;{{ method_link(method, false, true) }}</small>*/
/*                     {%- endif -%}*/
/*                 </div>*/
/*             </div>*/
/*         {% endfor %}*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block methods_details %}*/
/*     <div id="method-details">*/
/*         {% for method in methods %}*/
/*             <div class="method-item">*/
/*                 {{ block('method') }}*/
/*             </div>*/
/*         {% endfor %}*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block method %}*/
/*     <h3 id="method_{{ method.name|raw }}">*/
/*         <div class="location">{% if method.class is not same as(class) %}in {{ method_link(method, false, true) }} {% endif %}at line {{ method_source_link(method) }}</div>*/
/*         <code>{{ block('method_signature') }}</code>*/
/*     </h3>*/
/*     <div class="details">*/
/*         {{ deprecations(method) }}*/
/* */
/*         {% if method.shortdesc or method.longdesc %}*/
/*             <div class="method-description">*/
/*                 {% if not method.shortdesc and not method.longdesc %}*/
/*                     <p class="no-description">No description</p>*/
/*                 {% else %}*/
/*                     {% if method.shortdesc -%}*/
/*                     <p>{{ method.shortdesc|desc(class) }}</p>*/
/*                     {%- endif %}*/
/*                     {% if method.longdesc -%}*/
/*                     <p>{{ method.longdesc|desc(class) }}</p>*/
/*                     {%- endif %}*/
/*                 {%- endif %}*/
/*             </div>*/
/*         {% endif %}*/
/*         <div class="tags">*/
/*             {% if method.parameters %}*/
/*                 <h4>Parameters</h4>*/
/* */
/*                 {{ block('parameters') }}*/
/*             {% endif %}*/
/* */
/*             {% if method.hintDesc or method.hint %}*/
/*                 <h4>Return Value</h4>*/
/* */
/*                 {{ block('return') }}*/
/*             {% endif %}*/
/* */
/*             {% if method.exceptions %}*/
/*                 <h4>Exceptions</h4>*/
/* */
/*                 {{ block('exceptions') }}*/
/*             {% endif %}*/
/* */
/*             {% if method.tags('see') %}*/
/*                 <h4>See also</h4>*/
/* */
/*                 {{ block('see') }}*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
