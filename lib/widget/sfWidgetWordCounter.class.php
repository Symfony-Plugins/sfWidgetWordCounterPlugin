<?php
/**
 * Description of sfWidgetWordCounter
 *
 * @author pfwd
 */
class sfWidgetWordCounter extends sfWidgetForm {

    /**
     * Configures the current widget.
     *
     * Available options:
     *
     *  * counter_id:       The input that needs to be counted
     *  * target_id:        The target div that will contain the counter
     *  * config:           A JavaScript array that configures the JQuery date widget
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array()) {
       
        $this->addOption('counter_id', 'word-counter');
        $this->addOption('target_id', 'word-counter-target');
        $this->addOption('config', '{}');

        parent::configure($options, $attributes);

    }

    /**
     * @param  string $name        The element name
     * @param  string $value       The date displayed in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array()) {

        return
        $this->renderTag('div', array('id' => $this->getOption('target_id'))) .
        sprintf(<<<EOF
<script type="text/javascript">
    $("%s").wordCounter( "%s", "%s", %s );
</script>
EOF
                ,
                $this->getOption('counter_id'),
                $this->getOption('counter_id'),
                $this->getOption('target_id'),
                $this->getOption('config')
        );

    }

}
