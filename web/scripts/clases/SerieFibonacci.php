<?php
class SerieFibonacci implements Iterator {
    private int $_limite;
    private int $_claveActual;
    private int $_ultimo;
    private int $_penultimo;

    public function __construct(int $limite) {
        $this->_limite = $limite;
    }

    public function current(): int {
        return $this->_ultimo;
    }

    public function next(): void {
        if ($this->_claveActual === 0) {
            $this->_ultimo = 1;
            $this->_claveActual++;
            return;
        }

        $siguiente = $this->_ultimo + $this->_penultimo;

        $this->_penultimo = $this->_ultimo;
        $this->_ultimo = $siguiente;

        $this->_claveActual++;
    }

    public function rewind(): void {
        $this->_claveActual = 0;
        $this->_penultimo = 0;
        $this->_ultimo = 0;
    }

    public function key(): int {
        return $this->_claveActual;
    }

    public function valid(): bool {
        return $this->_claveActual < $this->_limite;
    }

    public static function fFibonacci(int $ultimo) {
        if ($ultimo < 0) {
            return;
        }

        $penultimo = 0;
        $actual = 1;

        yield 0;

        while ($actual <= $ultimo) {
            yield $actual;

            $siguiente = $actual + $penultimo;
            $penultimo = $actual;
            $actual = $siguiente;
        }
    }
}