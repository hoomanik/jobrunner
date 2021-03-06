<?php

namespace Barracuda\JobRunner;

/**
 * Class JobDefinition
 * This class has configuration relevant to running the job. E.g. when and for how long.
 */
class JobDefinition
{
	/**
	 * @var string
	 */
	private $class_name;

	/**
	 * @var bool
	 */
	private $enabled;

	/**
	 * @var null|string
	 */
	private $run_time;

	/**
	 * @var int
	 */
	private $interval;

	/**
	 * @var int
	 */
	private $max_run_time;

	/**
	 * @var \ReflectionClass The instance of ReflectionClass of the Job class
	 */
	private $reflection;

	/**
	 * @var int The unix timestamp of when the job last started.
	 */
	private $last_run_time_start;

	/**
	 * @var int The unix timestamp of when the job last finished.
	 */
	private $last_run_time_finish;

	/**
	 * JobDefinition constructor.
	 * @param string $class_name   The fully namespaced name of the class extending Job.
	 * @param bool   $enabled      True if the job should run, false if not.
	 * @param string $run_time     When the job should run in the format of 14:00 (2 pm every day).
	 * @param int    $interval     Amount of seconds in between job runs. Default is every 6 hours.
	 * @param int    $max_run_time The max amount of time the job should run for. Default is 2 days.
	 */
	public function __construct($class_name, $enabled = true, $run_time = null, $interval = 21600, $max_run_time = 172800)
	{
		$this->class_name = $class_name;
		$this->enabled = $enabled;
		$this->run_time = $run_time;
		$this->interval = $interval;
		$this->max_run_time = $max_run_time;
	}

	/**
	 * @return string
	 */
	public function getClassName()
	{
		return $this->class_name;
	}

	/**
	 * @param string $class_name
	 */
	public function setClassName($class_name)
	{
		$this->class_name = $class_name;
	}

	/**
	 * @return bool
	 */
	public function getEnabled()
	{
		return $this->enabled;
	}

	/**
	 * @param bool $enabled
	 */
	public function setEnabled($enabled)
	{
		$this->enabled = $enabled;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRunTime()
	{
		return $this->run_time;
	}

	/**
	 * @param string $run_time
	 */
	public function setRunTime($run_time)
	{
		$this->run_time = $run_time;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getInterval()
	{
		return $this->interval;
	}

	/**
	 * @param int $interval
	 */
	public function setInterval($interval)
	{
		$this->interval = $interval;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getMaxRunTime()
	{
		return $this->max_run_time;
	}

	/**
	 * @param int $max_run_time
	 */
	public function setMaxRunTime($max_run_time)
	{
		$this->max_run_time = $max_run_time;
		return $this;
	}

	/**
	 * Getters and setters for internals below
	 */

	/**
	 * @return \ReflectionClass
	 */
	public function getReflection()
	{
		return $this->reflection;
	}

	/**
	 * @param \ReflectionClass $reflection
	 */
	public function setReflection(\ReflectionClass $reflection)
	{
		$this->reflection = $reflection;
	}

	/**
	 * @return int
	 */
	public function getLastRunTimeStart()
	{
		return $this->last_run_time_start;
	}

	/**
	 * @param int $last_run_time_start
	 */
	public function setLastRunTimeStart($last_run_time_start)
	{
		$this->last_run_time_start = $last_run_time_start;
	}

	/**
	 * @return int
	 */
	public function getLastRunTimeFinish()
	{
		return $this->last_run_time_finish;
	}

	/**
	 * @param int $last_run_time_finish
	 */
	public function setLastRunTimeFinish($last_run_time_finish)
	{
		$this->last_run_time_finish = $last_run_time_finish;
	}
}
