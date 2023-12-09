import os
extensions = [".php",".js",".css",".py",".sh",".bat"]
excluded = [".ipynb_checkpoints",".git","fonts","imgs","trash_can"]

def getFiles(path):
    files=[]
    for item in os.listdir(path):
        item_path =  os.path.join(path, item)
        if os.path.isfile(item_path) and os.path.splitext(item_path)[1] in extensions:
            files.append(item)            
        elif os.path.isdir(item_path) and os.path.splitext(item_path)[0].split("\\")[1] not in excluded :
                files.extend(getFiles(item_path))
        
    return files

print(getFiles("C:/xampp/htdocs/asd"))
