<?php

/* macros.twig */
class __TwigTemplate_299ce576c5506d11913ec463a264a411fc302cc00f716e2749b0ff8ca4bdb654 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 14
        echo "
";
        // line 20
        echo "
";
        // line 26
        echo "
";
        // line 42
        echo "
";
        // line 48
        echo "
";
        // line 56
        echo "
";
        // line 60
        echo "
";
        // line 72
        echo "
";
        // line 94
        echo "
";
        // line 106
        echo "
";
        // line 110
        echo "
";
    }

    // line 1
    public function getnamespace_link($__namespace__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "namespace" => $__namespace__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "<a href=\"";
            echo $this->env->getExtension('sami')->pathForNamespace($context, (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")));
            echo "\">";
            echo (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace"));
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 5
    public function getclass_link($__class__ = null, $__absolute__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "absolute" => $__absolute__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "projectclass", array())) {
                // line 7
                echo "<a href=\"";
                echo $this->env->getExtension('sami')->pathForClass($context, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                echo "\">";
            } elseif ($this->getAttribute(            // line 8
(isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "phpclass", array())) {
                // line 9
                echo "<a target=\"_blank\" href=\"http://php.net/";
                echo (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class"));
                echo "\">";
            }
            // line 11
            echo $this->env->getExtension('sami')->abbrClass((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), ((array_key_exists("absolute", $context)) ? (_twig_default_filter((isset($context["absolute"]) ? $context["absolute"] : $this->getContext($context, "absolute")), false)) : (false)));
            // line 12
            if (($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "projectclass", array()) || $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "phpclass", array()))) {
                echo "</a>";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 15
    public function getmethod_link($__method__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 16
            echo "<a href=\"";
            echo $this->env->getExtension('sami')->pathForMethod($context, (isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")));
            echo "\">";
            // line 17
            echo $this->env->getExtension('sami')->abbrClass($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "class", array()));
            if ( !((array_key_exists("classonly", $context)) ? (_twig_default_filter((isset($context["classonly"]) ? $context["classonly"] : $this->getContext($context, "classonly")), false)) : (false))) {
                echo "::";
                echo $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "name", array());
            }
            // line 18
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 21
    public function getproperty_link($__property__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 22
            echo "<a href=\"";
            echo $this->env->getExtension('sami')->pathForProperty($context, (isset($context["property"]) ? $context["property"] : $this->getContext($context, "property")));
            echo "\">";
            // line 23
            echo $this->env->getExtension('sami')->abbrClass($this->getAttribute((isset($context["property"]) ? $context["property"] : $this->getContext($context, "property")), "class", array()));
            if ( !((array_key_exists("classonly", $context)) ? (_twig_default_filter((isset($context["classonly"]) ? $context["classonly"] : $this->getContext($context, "classonly")), true)) : (true))) {
                echo "#";
                echo $this->getAttribute((isset($context["property"]) ? $context["property"] : $this->getContext($context, "property")), "name", array());
            }
            // line 24
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 27
    public function gethint_link($__hints__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "hints" => $__hints__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 28
            $context["__internal_8849612af9aa30525f04c4258bcfff73bc5fea115dd56dfab72afcac62e575f6"] = $this;
            // line 30
            if ((isset($context["hints"]) ? $context["hints"] : $this->getContext($context, "hints"))) {
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["hints"]) ? $context["hints"] : $this->getContext($context, "hints")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["hint"]) {
                    // line 32
                    if ($this->getAttribute($context["hint"], "class", array())) {
                        // line 33
                        echo $context["__internal_8849612af9aa30525f04c4258bcfff73bc5fea115dd56dfab72afcac62e575f6"]->getclass_link($this->getAttribute($context["hint"], "name", array()));
                    } elseif ($this->getAttribute(                    // line 34
$context["hint"], "name", array())) {
                        // line 35
                        echo $this->env->getExtension('sami')->abbrClass($this->getAttribute($context["hint"], "name", array()));
                    }
                    // line 37
                    if ($this->getAttribute($context["hint"], "array", array())) {
                        echo "[]";
                    }
                    // line 38
                    if ( !$this->getAttribute($context["loop"], "last", array())) {
                        echo "|";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hint'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 43
    public function getsource_link($__project__ = null, $__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "project" => $__project__,
            "class" => $__class__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 44
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "sourcepath", array())) {
                // line 45
                echo "        (<a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "sourcepath", array()), "html", null, true);
                echo "\">View source</a>)";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 49
    public function getmethod_source_link($__method__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 50
            if ($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "sourcepath", array())) {
                // line 51
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "sourcepath", array()), "html", null, true);
                echo "\">line ";
                echo $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "line", array());
                echo "</a>";
            } else {
                // line 53
                echo "        line ";
                echo $this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "line", array());
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 57
    public function getabbr_class($__class__ = null, $__absolute__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "absolute" => $__absolute__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 58
            echo "<abbr title=\"";
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((((array_key_exists("absolute", $context)) ? (_twig_default_filter((isset($context["absolute"]) ? $context["absolute"] : $this->getContext($context, "absolute")), false)) : (false))) ? ((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class"))) : ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "shortname", array()))), "html", null, true);
            echo "</abbr>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 61
    public function getmethod_parameters_signature($__method__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 62
            $context["__internal_2e7bf7cdea34ae1ba1c7d2004dbb8d68b90cc0062f4700dda2f4bf8a626e6c94"] = $this->loadTemplate("macros.twig", "macros.twig", 62);
            // line 63
            echo "(";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "parameters", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
                // line 65
                if ($this->getAttribute($context["parameter"], "hashint", array())) {
                    echo $context["__internal_2e7bf7cdea34ae1ba1c7d2004dbb8d68b90cc0062f4700dda2f4bf8a626e6c94"]->gethint_link($this->getAttribute($context["parameter"], "hint", array()));
                    echo " ";
                }
                // line 66
                echo "\$";
                echo $this->getAttribute($context["parameter"], "name", array());
                // line 67
                if ($this->getAttribute($context["parameter"], "default", array())) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["parameter"], "default", array()), "html", null, true);
                }
                // line 68
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo ")";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 73
    public function getrender_classes($__classes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "classes" => $__classes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 74
            $context["__internal_6029c3171cc7c8fd41a3f27b00a978caa8436f2da5ad1eceab4d518b93d53755"] = $this;
            // line 75
            echo "
    <div class=\"container-fluid underlined\">
        ";
            // line 77
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")));
            foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                // line 78
                echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
                // line 80
                if ($this->getAttribute($context["class"], "isInterface", array())) {
                    // line 81
                    echo "                        <em>";
                    echo $context["__internal_6029c3171cc7c8fd41a3f27b00a978caa8436f2da5ad1eceab4d518b93d53755"]->getclass_link($context["class"], true);
                    echo "</em>
                    ";
                } else {
                    // line 83
                    echo "                        ";
                    echo $context["__internal_6029c3171cc7c8fd41a3f27b00a978caa8436f2da5ad1eceab4d518b93d53755"]->getclass_link($context["class"], true);
                    echo "
                    ";
                }
                // line 85
                echo "                    ";
                echo $context["__internal_6029c3171cc7c8fd41a3f27b00a978caa8436f2da5ad1eceab4d518b93d53755"]->getdeprecated($context["class"]);
                echo "
                </div>
                <div class=\"col-md-6\">
                    ";
                // line 88
                echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["class"], "shortdesc", array()), $context["class"]);
                echo "
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "    </div>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 95
    public function getbreadcrumbs($__namespace__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "namespace" => $__namespace__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 96
            echo "    ";
            $context["current_ns"] = "";
            // line 97
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")), "\\"));
            foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
                // line 98
                echo "        ";
                if ((isset($context["current_ns"]) ? $context["current_ns"] : $this->getContext($context, "current_ns"))) {
                    // line 99
                    echo "            ";
                    $context["current_ns"] = (((isset($context["current_ns"]) ? $context["current_ns"] : $this->getContext($context, "current_ns")) . "\\") . $context["ns"]);
                    // line 100
                    echo "        ";
                } else {
                    // line 101
                    echo "            ";
                    $context["current_ns"] = $context["ns"];
                    // line 102
                    echo "        ";
                }
                // line 103
                echo "        <li><a href=\"";
                echo $this->env->getExtension('sami')->pathForNamespace($context, (isset($context["current_ns"]) ? $context["current_ns"] : $this->getContext($context, "current_ns")));
                echo "\">";
                echo $context["ns"];
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 107
    public function getdeprecated($__reflection__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "reflection" => $__reflection__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 108
            echo "    ";
            if ($this->getAttribute((isset($context["reflection"]) ? $context["reflection"] : $this->getContext($context, "reflection")), "deprecated", array())) {
                echo "<small><sup><span class=\"label label-danger\">deprecated</span></sup></small>";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 111
    public function getdeprecations($__reflection__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "reflection" => $__reflection__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 112
            echo "    ";
            $context["__internal_4b96c04bd5ec6e295616f6204abae1f67e46eec73c6dc0df6584d726a888831e"] = $this;
            // line 113
            echo "
    ";
            // line 114
            if ($this->getAttribute((isset($context["reflection"]) ? $context["reflection"] : $this->getContext($context, "reflection")), "deprecated", array())) {
                // line 115
                echo "        <p>
            ";
                // line 116
                echo $context["__internal_4b96c04bd5ec6e295616f6204abae1f67e46eec73c6dc0df6584d726a888831e"]->getdeprecated((isset($context["reflection"]) ? $context["reflection"] : $this->getContext($context, "reflection")));
                echo "
            ";
                // line 117
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["reflection"]) ? $context["reflection"] : $this->getContext($context, "reflection")), "deprecated", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 118
                    echo "                <tr>
                    <td>";
                    // line 119
                    echo $this->getAttribute($context["tag"], 0, array(), "array");
                    echo "</td>
                    <td>";
                    // line 120
                    echo twig_join_filter(twig_slice($this->env, $context["tag"], 1, null), " ");
                    echo "</td>
                </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 123
                echo "        </p>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  675 => 123,  666 => 120,  662 => 119,  659 => 118,  655 => 117,  651 => 116,  648 => 115,  646 => 114,  643 => 113,  640 => 112,  628 => 111,  610 => 108,  598 => 107,  574 => 103,  571 => 102,  568 => 101,  565 => 100,  562 => 99,  559 => 98,  554 => 97,  551 => 96,  539 => 95,  524 => 92,  514 => 88,  507 => 85,  501 => 83,  495 => 81,  493 => 80,  489 => 78,  485 => 77,  481 => 75,  479 => 74,  467 => 73,  452 => 70,  436 => 68,  431 => 67,  428 => 66,  423 => 65,  406 => 64,  404 => 63,  402 => 62,  390 => 61,  371 => 58,  358 => 57,  341 => 53,  334 => 51,  332 => 50,  320 => 49,  302 => 45,  300 => 44,  287 => 43,  257 => 38,  253 => 37,  250 => 35,  248 => 34,  246 => 33,  244 => 32,  227 => 31,  225 => 30,  223 => 28,  211 => 27,  196 => 24,  190 => 23,  186 => 22,  172 => 21,  157 => 18,  151 => 17,  147 => 16,  133 => 15,  116 => 12,  114 => 11,  109 => 9,  107 => 8,  103 => 7,  101 => 6,  88 => 5,  69 => 2,  57 => 1,  52 => 110,  49 => 106,  46 => 94,  43 => 72,  40 => 60,  37 => 56,  34 => 48,  31 => 42,  28 => 26,  25 => 20,  22 => 14,  19 => 4,);
    }
}
/* {% macro namespace_link(namespace) -%}*/
/*     <a href="{{ namespace_path(namespace) }}">{{ namespace|raw }}</a>*/
/* {%- endmacro %}*/
/* */
/* {% macro class_link(class, absolute) -%}*/
/*     {%- if class.projectclass -%}*/
/*         <a href="{{ class_path(class) }}">*/
/*     {%- elseif class.phpclass -%}*/
/*         <a target="_blank" href="http://php.net/{{ class|raw }}">*/
/*     {%- endif %}*/
/*     {{- abbr_class(class, absolute|default(false)) }}*/
/*     {%- if class.projectclass or class.phpclass %}</a>{% endif %}*/
/* {%- endmacro %}*/
/* */
/* {% macro method_link(method, absolute, classonly) -%}*/
/*     <a href="{{ method_path(method) }}">*/
/*         {{- abbr_class(method.class) }}{% if not classonly|default(false) %}::{{ method.name|raw }}{% endif -%}*/
/*     </a>*/
/* {%- endmacro %}*/
/* */
/* {% macro property_link(property, absolute, classonly) -%}*/
/*     <a href="{{ property_path(property) }}">*/
/*         {{- abbr_class(property.class) }}{% if not classonly|default(true) %}#{{ property.name|raw }}{% endif -%}*/
/*     </a>*/
/* {%- endmacro %}*/
/* */
/* {% macro hint_link(hints) -%}*/
/*     {%- from _self import class_link %}*/
/* */
/*     {%- if hints %}*/
/*         {%- for hint in hints %}*/
/*             {%- if hint.class %}*/
/*                 {{- class_link(hint.name) }}*/
/*             {%- elseif hint.name %}*/
/*                 {{- abbr_class(hint.name) }}*/
/*             {%- endif %}*/
/*             {%- if hint.array %}[]{% endif %}*/
/*             {%- if not loop.last %}|{% endif %}*/
/*         {%- endfor %}*/
/*     {%- endif %}*/
/* {%- endmacro %}*/
/* */
/* {% macro source_link(project, class) -%}*/
/*     {% if class.sourcepath %}*/
/*         (<a href="{{ class.sourcepath }}">View source</a>)*/
/*     {%- endif %}*/
/* {%- endmacro %}*/
/* */
/* {% macro method_source_link(method) -%}*/
/*     {% if method.sourcepath %}*/
/*         <a href="{{ method.sourcepath }}">line {{ method.line|raw }}</a>*/
/*     {%- else %}*/
/*         line {{ method.line|raw }}*/
/*     {%- endif %}*/
/* {%- endmacro %}*/
/* */
/* {% macro abbr_class(class, absolute) -%}*/
/*     <abbr title="{{ class }}">{{ absolute|default(false) ? class : class.shortname }}</abbr>*/
/* {%- endmacro %}*/
/* */
/* {% macro method_parameters_signature(method) -%}*/
/*     {%- from "macros.twig" import hint_link -%}*/
/*     (*/
/*         {%- for parameter in method.parameters %}*/
/*             {%- if parameter.hashint %}{{ hint_link(parameter.hint) }} {% endif -%}*/
/*             ${{ parameter.name|raw }}*/
/*             {%- if parameter.default %} = {{ parameter.default }}{% endif %}*/
/*             {%- if not loop.last %}, {% endif %}*/
/*         {%- endfor -%}*/
/*     )*/
/* {%- endmacro %}*/
/* */
/* {% macro render_classes(classes) -%}*/
/*     {% from _self import class_link, deprecated %}*/
/* */
/*     <div class="container-fluid underlined">*/
/*         {% for class in classes %}*/
/*             <div class="row">*/
/*                 <div class="col-md-6">*/
/*                     {% if class.isInterface %}*/
/*                         <em>{{ class_link(class, true) }}</em>*/
/*                     {% else %}*/
/*                         {{ class_link(class, true) }}*/
/*                     {% endif %}*/
/*                     {{ deprecated(class) }}*/
/*                 </div>*/
/*                 <div class="col-md-6">*/
/*                     {{ class.shortdesc|desc(class) }}*/
/*                 </div>*/
/*             </div>*/
/*         {% endfor %}*/
/*     </div>*/
/* {%- endmacro %}*/
/* */
/* {% macro breadcrumbs(namespace) %}*/
/*     {% set current_ns = '' %}*/
/*     {% for ns in namespace|split('\\') %}*/
/*         {% if current_ns %}*/
/*             {% set current_ns = current_ns ~ '\\' ~ ns %}*/
/*         {% else %}*/
/*             {% set current_ns = ns %}*/
/*         {% endif %}*/
/*         <li><a href="{{ namespace_path(current_ns) }}">{{ ns|raw }}</a></li>*/
/*     {% endfor %}*/
/* {% endmacro %}*/
/* */
/* {% macro deprecated(reflection) %}*/
/*     {% if reflection.deprecated %}<small><sup><span class="label label-danger">deprecated</span></sup></small>{% endif %}*/
/* {% endmacro %}*/
/* */
/* {% macro deprecations(reflection) %}*/
/*     {% from _self import deprecated %}*/
/* */
/*     {% if reflection.deprecated %}*/
/*         <p>*/
/*             {{ deprecated(reflection )}}*/
/*             {% for tag in reflection.deprecated %}*/
/*                 <tr>*/
/*                     <td>{{ tag[0]|raw }}</td>*/
/*                     <td>{{ tag[1:]|join(' ')|raw }}</td>*/
/*                 </tr>*/
/*             {% endfor %}*/
/*         </p>*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
