import os
extensions = [".php",".js",".css",".py",".sh",".bat"]
excluded = [".ipynb_checkpoints",".git","fonts","imgs","trash_can"]

def getLineCount(path):
    lines=0
    for item in os.listdir(path):
        item_path =  os.path.join(path, item)
        if os.path.isfile(item_path) and os.path.splitext(item_path)[1] in extensions:
            with open(item_path,"r") as f:
                lines+= sum(1 for line in f)
        elif os.path.isdir(item_path) and os.path.splitext(item_path)[0].split("\\")[1] not in excluded :
                lines+=getLineCount(item_path)
        
    return lines
try:
    print(getLineCount("C:/xampp/htdocs/asd"))
except Exception as e:
    import sys
    print(f"Error: {e}", file=sys.stderr)
    sys.exit(1)