<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'name' => $this->faker->randomElement([
        'PHP', 'Dart', 'C', 'C++', 'JavaScript', 'Python', 'Java', 'Ruby', 'Go', 'Swift', 'Kotlin',
        'Rust', 'TypeScript', 'Scala', 'Perl', 'Haskell', 'Lua', 'Elixir', 'Clojure', 'Erlang', 'C#', 'F#',
        'Objective-C', 'R', 'MATLAB', 'Groovy', 'Visual Basic', 'Assembly', 'COBOL', 'Fortran', 'Pascal', 'Ada',
        'Shell', 'SQL', 'HTML', 'CSS', 'XML', 'JSON', 'YAML', 'TOML', 'Markdown', 'LaTeX', 'SAS', 'SPSS', 'Stata',
        'RPG', 'ABAP', 'ActionScript', 'Alice', 'Apex', 'Awk', 'Bash', 'bc', 'Bourne shell', 'XQuery', 'Zig', 'Wolfram',
        'C shell', 'CHILL', 'CLIPS', 'CoffeeScript', 'ColdFusion', 'Crystal', 'Curl', 'D', 'DCL', 'Dylan', 'Eiffel',
        'Forth', 'GAMS', 'GAP', 'GML', 'IDL', 'Io', 'J', 'JScript', 'LabVIEW', 'Ladder Logic', 'Lingo', 'LiveCode',
        'ML', 'Modula-2', 'NATURAL', 'Nim', 'OCaml', 'OpenCL', 'OpenEdge ABL', 'PL/I', 'PL/SQL', 'PostScript', 'Prolog',
        'PureBasic', 'Q', 'Racket', 'REXX', 'S', 'S-PLUS', 'Smalltalk', 'SPARK', 'SPIN', 'Tcl', 'VHDL', 'Verilog', 'Vim script',
      ]),
      'hours' => $this->faker->randomNumber(2),
    ];
  }

}
