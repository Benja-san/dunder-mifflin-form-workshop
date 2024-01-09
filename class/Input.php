<?php

class Input{

    public function __construct(
        private string $type = "text",
        private string $label = "Your name",
        private string $name = "firstname",
        private bool $required = false,
        private string | null $id = null,
    )
    {
        if($this->id === null){
            $this->id = $this->name;
        }
    }


        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }

        /**
         * Get the value of label
         */ 
        public function getLabel()
        {
                return $this->label;
        }

        /**
         * Set the value of label
         *
         * @return  self
         */ 
        public function setLabel($label)
        {
                $this->label = $label;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of required
         */ 
        public function getRequired()
        {
                return $this->required;
        }

        /**
         * Set the value of required
         *
         * @return  self
         */ 
        public function setRequired($required)
        {
                $this->required = $required;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}