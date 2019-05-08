<?php

/* checkbox.twig */
class __TwigTemplate_56444fe76978bf2f4c7aaf15b9f9a233a2e69486f202f7521fdfd7a5337b556c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<input type=\"checkbox\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["html_field_name"]) ? $context["html_field_name"] : null), "html", null, true);
        echo "\"";
        // line 2
        if ((isset($context["html_field_id"]) || array_key_exists("html_field_id", $context))) {
            echo " id=\"";
            echo twig_escape_filter($this->env, (isset($context["html_field_id"]) ? $context["html_field_id"] : null), "html", null, true);
            echo "\"";
        }
        // line 3
        if (((isset($context["checked"]) || array_key_exists("checked", $context)) && (isset($context["checked"]) ? $context["checked"] : null))) {
            echo " checked=\"checked\"";
        }
        // line 4
        if (((isset($context["onclick"]) || array_key_exists("onclick", $context)) && (isset($context["onclick"]) ? $context["onclick"] : null))) {
            echo " class=\"autosubmit\"";
        }
        echo " /><label";
        // line 5
        if ((isset($context["html_field_id"]) || array_key_exists("html_field_id", $context))) {
            echo " for=\"";
            echo twig_escape_filter($this->env, (isset($context["html_field_id"]) ? $context["html_field_id"] : null), "html", null, true);
            echo "\"";
        }
        // line 6
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
        echo "</label>
";
    }

    public function getTemplateName()
    {
        return "checkbox.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 6,  38 => 5,  33 => 4,  29 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "checkbox.twig", "/home/ubuntu/workspace/lifeprice/phpMyAdmin/templates/checkbox.twig");
    }
}
