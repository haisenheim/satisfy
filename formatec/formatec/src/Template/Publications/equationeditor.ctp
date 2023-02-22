
  <div class="cols">
    <div class="math-form col">
      <div class="button-bar"></div>

      <div class="math"></div>
    </div>
    <div class="button-groups col">
    </div>
  </div>
  <script type="text/javascript">
    var params = top.tinymce.activeEditor.windowManager.getParams();
    var existingLatex = params['existing_latex'];

    var equationEditor = new EquationEditor.EquationEditorView({
      $el: $('.equation-editor'),
      existingLatex: existingLatex,
      restrictions: top.tinymce.equationEditorRestrictions
    }).render();

    params['latexInput'] = equationEditor.input();
    top.tinymce.activeEditor.windowManager.setParams(params);
  </script>

