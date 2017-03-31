<?php
namespace Recipe\View;

use Cake\Core\Configure;
use Cake\View\SerializedView;
use Cake\Datasource\EntityInterface;
use Cake\Utility\Inflector;

use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class ApiView extends SerializedView
{

	protected $_baseUrl;
	protected $_data;
	protected $_manager;
	protected $_serializer;
	protected $_transform;
	protected $_resource;
	protected $_type;

	public function initialize()
	{
		$this->_setBaseUrl();
		$this->_setData();
		$this->_setManager();
		$this->_setSerializer();
		$this->_setTransform();
		$this->_setType();
		$this->_setResource();
	}

	protected function _serialize($serialize)
	{
		$manager = $this->getManager();
		$manager->setSerializer($this->getSerializer());

		return json_encode($manager->createData($this->getResource())->toArray());
	}

	protected function getBaseUrl()
	{
		return $this->_baseUrl;
	}

	protected function _setBaseUrl()
	{
		$this->_baseUrl = $this->request->getUri()->getScheme() . "://" . $this->request->getUri()->getHost();
	}

	protected function getData()
	{
		return $this->_data;
	}

	protected function _setData()
	{
		$this->_data = $this->viewVars[$this->viewVars['_serialize'][0]];
	}

	protected function getManager()
	{
		return $this->_manager;
	}

	protected function _setManager()
	{
		$this->_manager = new Manager();
	}

	protected function getSerializer()
	{
		return $this->_serializer;
	}

	protected function _setSerializer()
	{
		$this->_serializer = new JsonApiSerializer($this->getBaseUrl());
	}

	protected function getResource()
	{
		return $this->_resource;
	}

	protected function _setResource()
	{
		$data   = $this->getData();
		$class  = "\\League\\Fractal\\Resource\\";
		$class .= ($data instanceof EntityInterface) ? "Item" : "Collection";

		$this->_resource = new $class($data, $this->getTransform(), $this->getType());
	}

	protected function _setType()
	{
		$this->_type = strtolower($this->request->param('controller'));
	}

	protected function getType()
	{
		return $this->_type;
	}

	protected function _setTransform()
	{
		$class = implode("\\", [
			Configure::read("App.namespace"),
			"Transformer",
			Inflector::singularize($this->request->param('controller')) . "Transformer"
		]);

		$this->_transform = new $class;
	}

	protected function getTransform()
	{
		return $this->_transform;
	}

}