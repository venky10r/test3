/*
 * Copyright (c) 2023, Oracle and/or its affiliates.
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
'use strict';
Object.defineProperty(exports, "__esModule", { value: true });
exports.launch = void 0;
const fs = require("fs");
const os = require("os");
const path = require("path");
const child_process_1 = require("child_process");
const process_1 = require("process");
function find(info) {
    let nbcode = os.platform() === 'win32' ?
        os.arch() === 'x64' ? 'nbcode64.exe' : 'nbcode.exe'
        : 'nbcode.sh';
    let nbcodePath = path.join(info.extensionPath, "nbcode", "bin", nbcode);
    let nbcodePerm = fs.statSync(nbcodePath);
    if (!nbcodePerm.isFile()) {
        throw `Cannot execute ${nbcodePath}`;
    }
    if (os.platform() !== 'win32') {
        fs.chmodSync(path.join(info.extensionPath, "nbcode", "bin", nbcode), "744");
        fs.chmodSync(path.join(info.extensionPath, "nbcode", "platform", "lib", "nbexec.sh"), "744");
        fs.chmodSync(path.join(info.extensionPath, "nbcode", "java", "maven", "bin", "mvn.sh"), "744");
    }
    return nbcodePath;
}
function enableDisableModules(info, userDir, modules, enable) {
    if (modules) {
        for (var i = 0; i < modules.length; i++) {
            const module = modules[i];
            const moduleXml = module.replace(/\./g, "-") + ".xml";
            var xmlContent = "";
            const clusters = fs.readdirSync(path.join(info.extensionPath, "nbcode"));
            for (var c = 0; c < clusters.length; c++) {
                const sourceXmlPath = path.join(info.extensionPath, "nbcode", clusters[c], "config", "Modules", moduleXml);
                if (fs.existsSync(sourceXmlPath)) {
                    xmlContent = fs.readFileSync(sourceXmlPath).toString();
                }
            }
            xmlContent = xmlContent.replace(`<param name="enabled">${!enable}</param>`, `<param name="enabled">${enable}</param>`);
            fs.mkdirSync(path.join(userDir, "config", "Modules"), { recursive: true });
            fs.writeFileSync(path.join(userDir, "config", "Modules", moduleXml), xmlContent);
        }
    }
}
function launch(info, ...extraArgs) {
    let nbcodePath = find(info);
    const userDir = path.join(info.storagePath, "userdir");
    fs.mkdirSync(userDir, { recursive: true });
    let userDirPerm = fs.statSync(userDir);
    if (!userDirPerm.isDirectory()) {
        throw `Cannot create ${userDir}`;
    }
    enableDisableModules(info, userDir, info.disableModules, false);
    enableDisableModules(info, userDir, info.enableModules, true);
    let clusterPath = info.clusters.join(path.delimiter);
    let ideArgs = [
        '--userdir', userDir
    ];
    if (info.jdkHome) {
        ideArgs.push('--jdkhome', info.jdkHome);
    }
    if (info.projectSearchRoots) {
        ideArgs.push(`-J-Dproject.limitScanRoot="${info.projectSearchRoots}"`);
    }
    if (info.verbose) {
        ideArgs.push('-J-Dnetbeans.logger.console=true');
    }
    ideArgs.push(`-J-Dnetbeans.extra.dirs="${clusterPath}"`);
    if (process_1.env['netbeans.extra.options']) {
        ideArgs.push(...process_1.env['netbeans.extra.options'].split(' '));
    }
    ideArgs.push(...extraArgs);
    //    if (env['netbeans_debug'] && extraArgs && extraArgs.find(s => s.includes("--list"))) {
    //        ideArgs.push(...['-J-Xdebug', '-J-Dnetbeans.logger.console=true', '-J-agentlib:jdwp=transport=dt_socket,server=y,suspend=y,address=8000']);
    //    }
    let process = (0, child_process_1.spawn)(nbcodePath, ideArgs, {
        cwd: userDir,
        stdio: ["ignore", "pipe", "pipe"],
    });
    return process;
}
exports.launch = launch;
if (typeof process === 'object' && process.argv0 === 'node') {
    let extension = path.join(process.argv[1], '..', '..');
    let nbcode = path.join(extension, 'nbcode');
    if (!fs.existsSync(nbcode)) {
        throw `Cannot find ${nbcode}. Try npm run compile first!`;
    }
    let clusters = fs.readdirSync(nbcode).filter(c => c !== 'bin' && c !== 'etc').map(c => path.join(nbcode, c));
    let args = process.argv.slice(2);
    let json = JSON.parse("" + fs.readFileSync(path.join(extension, 'package.json')));
    let storage;
    if (!process_1.env.nbcode_userdir || process_1.env.nbcode_userdir == 'global') {
        storage = path.join(os.platform() === 'darwin' ?
            path.join(os.homedir(), 'Library', 'Application Support') :
            path.join(os.homedir(), '.config'), 'Code', 'User', 'globalStorage', json.publisher + '.' + json.name);
    }
    else {
        storage = process_1.env.nbcode_userdir;
    }
    console.log('Launching NBLS with user directory: ' + storage);
    let info = {
        clusters: clusters,
        extensionPath: extension,
        storagePath: storage,
        jdkHome: null
    };
    let p = launch(info, ...args);
    p.stdout.on('data', function (data) {
        console.log(data.toString());
    });
    p.stderr.on('data', function (data) {
        console.log(data.toString());
    });
    p.on('close', (code) => {
        console.log(`nbcode finished with status ${code}`);
    });
}
//# sourceMappingURL=nbcode.js.map